<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Dars_turi;
use App\Models\Fanlar;
use App\Models\Guruh;
use App\Models\Jurnal;
use App\Models\Mavzu;
use App\Models\Uquv_yili_ohtm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use function PHPUnit\Framework\isNull;

class MavzuController extends Controller
{

    public function index(Request $request )
    {
        $jurnal_id = $request->id;
        $fanuq = Mavzu::leftJoin('jurnals', 'mavzus.jurnal_id', '=', 'jurnals.id')
            ->leftJoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
            ->leftJoin('guruhs', 'guruhs.id', '=', 'jurnals.guruh_id')
            ->leftjoin('dars_turis','mavzus.dars_turis_id', '=', 'dars_turis.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','uquv_yili_ohtms.id')
            ->where(['fanlars.ohtm_id'=>auth()->user()->ohtm_id])->select('mavzus.id',
                'mavzus.nomi',
                'mavzus.soat',
                'mavzus.jurnal_id',
                'mavzus.file',
                'mavzus.file_path',
                'dars_turis.nomi as dars_turi_nomi',
                'dars_turis.id as dars_turi_id',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'guruhs.id as guruh_id',
                'uquv_yili_ohtms.nomi  as semestr',
                'dars_turis.nomi as dars_turi_nomi'
            )
            ->paginate(10);

        $fannomi =Jurnal::leftJoin('fanlars','jurnals.fanlar_id', '=','fanlars.id')
            ->leftJoin('guruhs','jurnals.guruh_id', '=', 'guruhs.id')
            ->leftJoin('uquv_yili_ohtms','jurnals.uquv_yili_ohtm_id','=', 'uquv_yili_ohtms.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->select('jurnals.id',
                'fanlars.nomi as fan_nomi',
                'guruhs.nomi as guruh_nomi',
                'uquv_yili_ohtms.nomi  as semestr'
            )
            ->get();
        $dars_turis = Dars_turi::select(
            'id',
            'nomi as dars_turi_nomi')
            ->get();
//        dd($fanuq);
        return view('ohtm_uqituvchi.mavzu', compact('fanuq', 'fannomi', 'dars_turis'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'nomi' => 'required',
            'soat' => 'required',
            'jurnal_id' => 'required|integer',
            'dars_turis_id' => 'required|integer',
            'file' => 'nullable|mimes:ppt,pptx,doc,docx,pdf|max:40960'
        ], [
            'nomi.required' => 'Mavzu kiritish majburiy!',
            'soat.required' => 'Soat kiritish majburiy!',
            'jurnal_id.required' => 'Jurnal tanlash majburiy!',
            'dars_turis_id.required' => 'Dars turi kiritish majburiy!',
            'file.mimes' => 'Faqat ppt, pptx, doc, docx, pdf fayllar yuklash mumkin!',
            'file.max' => 'Fayl hajmi 40MB dan oshmasligi kerak!',
        ]);

        DB::transaction(function () use ($request) {
            $fan = new Mavzu();
            $fan->nomi = $request->nomi;
            $fan->soat = $request->soat;
            $fan->jurnal_id = $request->jurnal_id;
            $fan->dars_turis_id = $request->dars_turis_id;

            // **Fayl yuklash**
            if ($request->hasFile('file')) {
                $file = $request->file('file'); // Faylni olish
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/mavzular', $fileName);

                // **Bazaga saqlash**
                $fan->file = $fileName; // Faylning nomini saqlaymiz
                $fan->file_path = $filePath;
            }

            $fan->save();
        });

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete( $id)
    {

        $item = Mavzu::find($id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        // Validatsiya
        $request->validate([
            'nomi' => 'required',
            'soat' => 'required',
            'jurnal_id' => 'required|integer',
            'dars_turis_id' => 'required|integer',
            'file' => 'nullable|mimes:ppt,pptx,doc,docx,pdf|max:40960' // 40MB
        ]);

        DB::transaction(function () use ($request, $id) {
            $fan = Mavzu::findOrFail($id);
            $fan->nomi = $request->nomi;
            $fan->soat = $request->soat;
            $fan->jurnal_id = $request->jurnal_id;
            $fan->dars_turis_id = $request->dars_turis_id;

            // **Agar yangi fayl yuklangan bo‘lsa, eski faylni o‘chirib, yangisini yuklaymiz**
            if ($request->hasFile('file')) {
                // Eski faylni o‘chirish
                if ($fan->file) {
                    Storage::delete('public/uploads/mavzular/' . $fan->file);
                }

                $file = $request->file('file'); // Yangi faylni olish
                $fileName = time() . '_' . $file->getClientOriginalName(); // Yangi nom
                $filePath = $file->storeAs('uploads/mavzular', $fileName, 'public'); // Saqlash

                $fan->file = $fileName;
                $fan->file_path = $filePath; // Faqat nomi
            }

            $fan->save();
        });

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

}
