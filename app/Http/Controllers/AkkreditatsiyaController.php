<?php

namespace App\Http\Controllers;

use App\Models\Ohtm;
use Illuminate\Http\Request;
use App\Models\Akkreditatsiya;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class AkkreditatsiyaController extends Controller
{
    public function index(){
        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
            ->orderBy('akk_id','desc')
            ->paginate(10);

        $ohtms = Ohtm::all()->select('id', 'qs_nomi');

        return view('mv_admin.akkreditatsiya', compact('akkre','ohtms'));
    }

    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'ohtm_id' => 'required',
            'akkre_nomi' => 'required|max:255',
            'sana' => 'required',
            'pdf' => 'required',
            'haqida' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'akkre_nomi.required' => 'Akkre. nomi kiritilishi majburiy!',
            'akkre_nomi.max' => 'Akkre. nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'sana.required' => 'Sana kiritilishi majburiy!',
            'pdf.required' => 'Fayl biriktirilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
        ]);



        $file = $request->file('pdf');

        $nomi = $file->getClientOriginalName();
        $qsrtma = $file->getClientOriginalExtension();

        $pdf_nomi_int =strtotime(Carbon::now()->toDateTimeString());

        $yangi_pdf = $pdf_nomi_int.'_'.$nomi;
        $path = $file->storeAs('storage',$yangi_pdf, 'public');

        $akkre = new Akkreditatsiya;
        $akkre->nomi = $request->akkre_nomi;
        $akkre->haqida = $request->haqida;
        $akkre->sana = $request->sana;
        $akkre->pdf = $yangi_pdf;
        $akkre->ohtm_id = $request->ohtm_id;
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
            'ohtm_id' => 'required',
            'akkre_nomi' => 'required|max:255',
            'sana' => 'required',
            'haqida' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'akkre_nomi.required' => 'Akkre. nomi kiritilishi majburiy!',
            'akkre_nomi.max' => 'Akkre. nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'sana.required' => 'Sana kiritilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
        ]);

        $akkre = Akkreditatsiya::find($id);

        $akkre->nomi = $request->akkre_nomi;
        $akkre->haqida = $request->haqida;
        $akkre->sana = $request->sana;
        $akkre->ohtm_id = $request->ohtm_id;
        $akkre->save();

        $akkre->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
//
//    public function show($filename)
//    {
//        $url = Storage::url("uploads/{$filename}");
//
//        return view('file.show', ['url' => $url]);
//    }
}
