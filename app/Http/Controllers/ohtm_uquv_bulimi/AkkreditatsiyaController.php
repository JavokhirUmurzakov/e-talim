<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Akkreditatsiya;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AkkreditatsiyaController extends Controller
{
    public function index(){
        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
            ->select('akkreditatsiyas.id',
                'akkreditatsiyas.nomi',
                'akkreditatsiyas.haqida',
                'akkreditatsiyas.sana',
                'akkreditatsiyas.pdf',
                'akkreditatsiyas.ohtm_id',
                'ohtms.qs_nomi as ohtm_nomi')
            ->where('ohtm_id', auth()->user()->ohtm_id)
            ->orderBy('id','desc')
            ->paginate(10);
        return view('ohtm_uquv_bulimi.akkreditatsiya_ohtm', compact('akkre'));
    }


    public function create(Request $request)
    {
        // 1. Validatsiya
        $request->validate([
            'akkre_nomi' => 'required|max:255',
            'sana' => 'required|date',
            'pdf' => 'required|mimes:pdf,docx,pptx', // Faqat PDF fayl, 2MB limit
            'haqida' => 'required',
        ],[
            'akkre_nomi.required' => 'Akkre. nomi kiritilishi majburiy!',
            'akkre_nomi.max' => 'Akkre. nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'sana.required' => 'Sana kiritilishi majburiy!',
            'pdf.required' => 'Fayl biriktirilishi majburiy!',
            'pdf.mimes' => 'Faqat PDF fayl yuklash mumkin!',
            'pdf.max' => 'Fayl hajmi 2MB dan oshmasligi kerak!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
        ]);

        // 2. Faylni saqlash
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $nomi = $file->getClientOriginalName();
            $pdf_nomi_int = strtotime(Carbon::now()->toDateTimeString());
            $yangi_pdf = $pdf_nomi_int . '_' . $nomi;
            $file->storeAs('storage/pdf', $yangi_pdf); // Fayl `storage/app/public/pdf` ichiga tushadi
        } else {
            return back()->withErrors(['pdf' => 'Fayl yuklashda xatolik!']);
        }

        // 3. Ma’lumotni saqlash
        $akkre = new Akkreditatsiya;
        $akkre->nomi = $request->akkre_nomi;
        $akkre->haqida = $request->haqida;
        $akkre->sana = $request->sana;
        $akkre->pdf = $yangi_pdf;
        $akkre->ohtm_id = auth()->user()->ohtm_id;
        $akkre->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Akkreditatsiya::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){

        $request->validate([
            'akkre_nomi' => 'required|max:255',
            'sana' => 'required',
            'haqida' => 'required',
        ],[
            'akkre_nomi.required' => 'Akkre. nomi kiritilishi majburiy!',
            'akkre_nomi.max' => 'Akkre. nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'sana.required' => 'Sana kiritilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
        ]);

        $akkre = Akkreditatsiya::find($id);

        $akkre->nomi = $request->akkre_nomi;
        $akkre->haqida = $request->haqida;
        $akkre->sana = $request->sana;
        $akkre->ohtm_id = auth()->user()->ohtm_id;
        $akkre->save();

        $akkre->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
