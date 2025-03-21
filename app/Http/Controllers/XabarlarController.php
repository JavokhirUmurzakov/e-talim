<?php

namespace App\Http\Controllers;

use App\Models\Xabarlar;
use App\Models\Ohtm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class XabarlarController extends Controller
{
    public function index(){
        $xabar1 = Xabarlar::leftJoin('ohtms', 'ohtms.id', '=', 'xabarlars.ohtm_id')
            ->select('xabarlars.id as xab_id', 'xabarlars.nomi', 'xabarlars.haqida', 'xabarlars.sana',  'xabarlars.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi', 'xabarlars.xabar_muallifi','xabarlars.pdf')
            ->orderBy('xab_id','desc')
            ->paginate(10);

        $ohtms = Ohtm::all()->select('id', 'qs_nomi');

        return view('mv_admin.xabarlar', compact('xabar1','ohtms'));
    }

    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'ohtm_id' => 'required',
            'nomi' => 'required|max:255',
            'sana' => 'required',
            'pdf' => 'required',
            'haqida' => 'required',
            'xabar_muallifi' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'nomi.required' => 'Xabar nomi kiritilishi majburiy!',
            'nomi.max' => 'Xabar nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'sana.required' => 'Sana kiritilishi majburiy!',
            'pdf.required' => 'Fayl biriktirilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
            'xabar_muallifi.required' => "Xabar muallifi to'ldirilishi majburiy!",
        ]);



        $file = $request->file('pdf');

        $nomi = $file->getClientOriginalName();
        $qsrtma = $file->getClientOriginalExtension();

        $pdf_nomi_int =strtotime(Carbon::now()->toDateTimeString());

        $yangi_pdf = $pdf_nomi_int.'_'.$nomi;
        $path = $file->storeAs('storage',$yangi_pdf, 'public');

        $xabar1 = new Xabarlar;
        $xabar1->nomi = $request->nomi;
        $xabar1->haqida = $request->haqida;
        $xabar1->sana = $request->sana;
        $xabar1->pdf = $yangi_pdf;
        $xabar1->ohtm_id = $request->ohtm_id;
        $xabar1->xabar_muallifi = $request->xabar_muallifi;
        $xabar1->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete(Request $request){
        $item = Xabarlar::find($request->id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'ohtm_id' => 'required',
            'nomi' => 'required|max:255',
            'sana' => 'required',
            'pdf' => 'required',
            'haqida' => 'required',
            'xabar_muallifi' => 'required',
        ], [
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'nomi.required' => 'Xabar nomi kiritilishi majburiy!',
            'nomi.max' => 'Xabar nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'sana.required' => 'Sana kiritilishi majburiy!',
            'pdf.required' => 'Fayl biriktirilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
            'xabar_muallifi.required' => "Xabar muallifi to'ldirilishi majburiy!",
        ]);

        $xabar1 = Xabarlar::find($id);

        $xabar1->nomi = $request->nomi;
        $xabar1->haqida = $request->haqida;
        $xabar1->sana = $request->sana;
        $xabar1->ohtm_id = $request->ohtm_id;
        $xabar1->xabar_muallifi = $request->xabar_muallifi;
        $xabar1->save();

        $xabar1->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
