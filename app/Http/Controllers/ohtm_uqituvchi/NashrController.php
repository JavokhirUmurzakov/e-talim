<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Nashr;
use App\Models\Nashr_turi;
use App\Models\Uqituvchi;
use App\Models\Uquv_yili;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NashrController extends Controller
{
    public function index(){
        $nashr = Nashr::leftJoin('nashr_turis', 'nashrs.nashr_turi_id', '=', 'nashr_turis.id')
            ->leftJoin('uqituvchis', 'nashrs.uqituvchi_id', '=', 'uqituvchis.id')
            ->leftJoin('uquv_yilis','nashrs.uquv_yili_id', '=','uquv_yilis.id')
            ->select('nashrs.id',
                'nashrs.nomi',
                'nashrs.haqida',
                'nashrs.sana',
                'nashrs.pdf',
                'uqituvchis.fio',
                'uqituvchis.id as uqituvchi_id',
                'nashr_turis.nomi as nashr_turi',
                'nashr_turis.id as nashr_turi_id',
                'uquv_yilis.id as uquv_yili_nomi',
                'uquv_yilis.nomi as uqy_nomi',

            )->where('uqituvchis.ohtm_id' , auth()->user()->ohtm_id)
            ->where('nashrs.uqituvchi_id' , auth()->user()->uqituvchi->id)
            ->paginate(10);
        $uqy=Uquv_yili::all();
        $uqituvchi=Uqituvchi::select('id','fio');
        $nashr_turi=Nashr_turi::all();

//dd($nashr);
        return view('ohtm_uqituvchi.nashr', compact('nashr','uqy','uqituvchi','nashr_turi'));

    }

    public function create(Request $request) {
        // Validasiyani tekshirish
        $request->validate([
            'nomi' => 'required',
            'haqida' => 'required|max:255',
            'sana' => 'required',
            'pdf' => 'nullable|mimes:ppt,pptx,doc,docx,pdf|max:40960',
            'nashr_turi_id' => 'required|integer',
            'uquv_yili_id' => 'required|integer'
        ], [
            'nomi.required' => 'Nashr turi nomi kiritilishi majburiy!',
            'nomi.max' => 'Nashr turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'pdf.required' => 'PDF fayl yuklanishi kerak!',
            'pdf.mimes' => 'Faqat PDF fayl yuklashingiz mumkin!',
            'pdf.max' => 'Fayl hajmi 10MB dan oshmasligi kerak!',
        ]);

        // Model yaratish
        $nashir = new Nashr();
        $nashir->nomi = $request->nomi;
        $nashir->haqida = $request->haqida;
        $nashir->sana = $request->sana;
        $nashir->uqituvchi_id = auth()->user()->uqituvchi->id;
        $nashir->nashr_turi_id = $request->nashr_turi_id;
        $nashir->uquv_yili_id = $request->uquv_yili_id;

        // PDF Faylni yuklash
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf'); // Faylni olish
            $fileName = time() . '_' . $file->getClientOriginalName(); // Unikal nom berish
            $filePath = $file->storeAs('uploads/nashr/', $fileName); // Saqlash

            $nashir->pdf = $fileName; // Faqat fayl nomini bazaga yozish
        }

        // Ma'lumotni saqlash
        $nashir->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete($id) {
        $item = Nashr::findOrFail($id);

        // Faylni ham o'chirish (agar mavjud bo'lsa)
        $filePath = storage_path('app/uploads/mavzular/' . $item->pdf);
        if (file_exists($filePath)) {
            unlink($filePath); // Faylni o'chirish
        }

        $item->delete(); // Ma'lumotni o'chirish

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

//
    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required',
            'haqida'=>'required|max:255',
            'sana'=>'required',
            'pdf'=>'required',
            'nashr_turi_id'=>'required|integer',
            'uquv_yili_id'=>'required|integer'
        ],[
            'nomi.required' => 'Nashr turi nomi kiritilishi majburiy!',
            'nomi.max' => 'Nashr turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);

        $nashir = Nashr::find($id);
        $nashir->nomi = $request->nomi;
        $nashir->haqida=$request->haqida;
        $nashir->sana=$request->sana;
        $nashir->pdf=$request->pdf;
        $nashir->uqituvchi_id=auth()->user()->uqituvchi->id;
        $nashir->nashr_turi_id=$request->nashr_turi_id;
        $nashir->uquv_yili_id=$request->uquv_yili_id;

        // **Agar yangi fayl yuklangan bo‘lsa, eski faylni o‘chirib, yangisini yuklaymiz**
        if ($request->hasFile('file')) {
            // Eski faylni o‘chirish
            if ($nashir->pdf) {
                Storage::delete('public/uploads/mavzular/' . $nashir->pdf);
            }

            $nashir = $request->file('file'); // Yangi faylni olish
            $fileName = time() . '_' . $nashir->getClientOriginalName(); // Yangi nom
            $filePath = $nashir->storeAs('uploads/mavzular', $fileName, 'public'); // Saqlash

            $nashir->pdf = $fileName;
            $nashir->file_path = $filePath; // Faqat nomi
        }
        $nashir->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

}
