<?php

namespace App\Http\Controllers\ohtm_tinglovchi;

use App\Http\Controllers\Controller;
use App\Models\Tinglovchi;
use App\Models\Tinglovchi_shax_mal;
use Illuminate\Http\Request;

class TinglovchiShaxMalController extends Controller
{
    public function index()
    {
        if(auth()->user()->tinglovchi->shaxsiy_malumot == null){
            $shaxs_mal = new Tinglovchi_shax_mal();
//            dd(334545);
        }else{
            $shaxs_mal = Tinglovchi_shax_mal::where('id', auth()->user()->tinglovchi->shaxsiy_malumot->id)->first();
//            dd($shaxs_mal);
        }

        $tinglovchi = Tinglovchi::select('tinglovchis.id',
            'tinglovchis.fio')
            ->get();
//        $uqituvchi = Uqituvchi::where('uqituvchis.id', auth()->user()->id)
//            ->select('uqituvchis.id', 'uqituvchis.fio')->get();
//dd($shaxs_mal);

        return view('ohtm_tinglovchi.tinglovchi_shax_mal', compact('shaxs_mal', 'tinglovchi'));
    }

    public function create(Request $request){
        $id = $request->id;
        if($id == null){
            $malumot = new Tinglovchi_shax_mal();
        }else {
            $malumot = Tinglovchi_shax_mal::where('id', $id)->first();
        }

        $request->validate([
            'fuqarolik' => 'required',
            'pass_raqami' => 'required',
            'jshshir_kod' => 'required',
            'tugilgan_sana' =>'required',
            'jinsi'=>'required',
            'uy_manzili'=>'required',
            'haqida'=>'required',
        ],[
            'fuqarolik.max' => 'Fuqarolik kiritilishi kerak!',
            'pass_raqami.required' => 'Passport seriya va raqami kiritilishi majburiy!',
            'jshshir_kod.required' => 'JSHSHIR kiritilishi majburiy!',
            'tugilgan_sana.required' => "Tugilgan sana kiritilishi majburiy!",
            'jinsi.required' => "Jins belgilash majburiy!",
            'uy_manzili.required' => "Uy manzili kiritilishi majburiy!",
            'haqida.required' => "Qoshimcha ma'lumotlar!",
        ]);


        $malumot->fuqarolik = $request->fuqarolik;
        $malumot->pass_raqami = $request->pass_raqami;
        $malumot->jshshir_kod = $request->jshshir_kod;
        $malumot->tugilgan_sana = $request->tugilgan_sana;
        $malumot->jinsi = $request->jinsi;
        $malumot->haqida = $request->haqida;
        $malumot->uy_manzili = $request->uy_manzili;
        $malumot->tinglovchi_id =auth()->user()->tinglovchi->id;
//$malumot->uqituvchi_id = $request->uqituvchi_id;
        if($request->jinsi == 'on'){
            $malumot->jinsi = 1;
        }

        $malumot->save();


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }




    public function delete(Request $request)
    {

        $item = Tinglovchi_shax_mal::where('id', $request->id)->first();

        if ($item) {
            $item->delete();
            return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
        } else {
            return redirect()->back()->withError("O‘chiriladigan ma‘lumot topilmadi.");
        }
    }



    public function edit(Request $request, $id){

        $request->validate([
            'fuqarolik' => 'required',
            'pass_raqami' => 'required',
            'jshshir_kod' => 'required',
            'tugilgan_sana' =>'required',
            'jinsi' => 'required|in:0,1',
            'uy_manzili'=>'required',
            'haqida'=>'required',
            'tinglovchi_id'=>'required'
        ],[
            'fuqarolik.max' => 'Fuqarolik kiritilishi kerak!',
            'pass_raqami.required' => 'Passport seriya va raqami kiritilishi majburiy!',
            'jshshir_kod.required' => 'JSHSHIR kiritilishi majburiy!',
            'tugilgan_sana.required' => "Tugilgan sana kiritilishi majburiy!",
            'jinsi.required' => "Jins belgilash majburiy!",
            'uy_manzili.required' => "Uy manzili kiritilishi majburiy!",
            'haqida.required' => "Qoshimcha ma'lumotlar!",
            'tinglovchi_id.required' => "ID kiriting!",
        ]);

        $malumot = Tinglovchi_shax_mal::find($id);

//        $malumot->uqituvchi_id =auth()->user()->id;
        $malumot->fuqarolik = $request->fuqarolik;
        $malumot->pass_raqami = $request->pass_raqami;
        $malumot->jshshir_kod = $request->jshshir_kod;
        $malumot->tugilgan_sana = $request->tugilgan_sana;
        $malumot->jinsi = $request->jinsi;
        $malumot->haqida = $request->haqida;
        $malumot->uy_manzili = $request->uy_manzili;
        $malumot->tinglovchi_id = $request->tinglovchi_id;


        if ($request->faol == 'on') {
            $malumot->faol = 1;
        }

        $malumot->save();
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

}
