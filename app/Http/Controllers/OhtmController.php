<?php

namespace App\Http\Controllers;

use App\Models\Akkreditatsiya;
use App\Models\Ohtm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
//use function Monolog\alert;
use Illuminate\Support\Facades\DB;
use App\Models\Fakultet_kafedra;

class OhtmController extends Controller
{
    //
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
      $ohtms = Ohtm::all();

        return view('mv_admin.ohtm', compact('ohtms'));
    }

    public function getUqituvchi($ohtm_id){

        $uqituvchilar = Fakultet_kafedra::leftJoin('uqituvchis', 'uqituvchis.fakultet_kafedra_id', '=', 'fakultet_kafedras.id')
            ->leftJoin('harbiy_unvons', 'harbiy_unvons.id', '=', 'uqituvchis.harbiy_unvon_id')
            ->where('fakultet_kafedras.ohtm_id', $ohtm_id)
            ->where('uqituvchis.rahbar', true)
            ->select('uqituvchis.id as u_id', DB::raw("CONCAT(harbiy_unvons.qs_nomi, ' ', uqituvchis.fio) as unvon_fio"))
            ->get();

        return response()->json(['uqituvchilar' => $uqituvchilar]);
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'haqida' => 'required',
            'logo' => 'required',
        ],[
            'nomi.required' => 'OHTM nomi kiritilishi majburiy!',
            'nomi.max' => 'OHTM nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'OHTM qisqartma nomi kiritilishi majburiy!',
            'haqida.required' => 'Batafsil ma\'lumot biriktirilishi majburiy!',
            'logo.required' => "Fayl biriktirilishi majburiy!",
        ]);



        $file = $request->file('pdf');

//        $nomi1 = $file->getClientOriginalName();
//        $qsrtma = $file->getClientOriginalExtension();

        $pdf_nomi_int =strtotime(Carbon::now()->toDateTimeString());

//        $yangi_pdf = $pdf_nomi_int.'_'.$nomi1;
//        $path = $file->storeAs('storage',$yangi_pdf, 'public');

        $ohtms = new Ohtm;
        $ohtms->nomi = $request->nomi;
        $ohtms->qs_nomi = $request->qs_nomi;
        $ohtms->haqida = $request->haqida;
        $ohtms->logo = $request->logo;
        $ohtms->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Ohtm::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'haqida' => 'required',
            'logo' => 'required',
        ],[
            'nomi.required' => 'OHTM nomi kiritilishi majburiy!',
            'nomi.max' => 'OHTM nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'OHTM qisqartma nomi kiritilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
            'logo.required' => "Fayl biriktirilishi majburiy!",
        ]);

        $ohtms = Ohtm::find($id);

        $ohtms->nomi = $request->nomi;
        $ohtms->qs_nomi = $request->qs_nomi;
        $ohtms->haqida = $request->haqida;
        $ohtms->logo = $request->logo;

        $ohtms->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
