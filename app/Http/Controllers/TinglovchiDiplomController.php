<?php

namespace App\Http\Controllers;

use App\Models\Tinglovchi_diplom;
use App\Models\Yutuq_yunalish;
use Illuminate\Http\Request;

class TinglovchiDiplomController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $tinglovchi_diploms = Tinglovchi_diplom::all();

        return view('mv_admin.tinglovchi_diplom', compact('tinglovchi_diploms'));
    }


    public function create(Request $request){
        //dd($request);

        $request->validate([
            'klassifikatsiya' => 'required',
            'seriya' => 'required',
            'bitiruv_ishi' => 'required',
            'uqish_vaqti' => 'required',
            'baholar' => 'required',
            'haqida' => 'required',
        ],[
            'klassifikatsiya.required' => 'Klassifikatsiya nomi kiritilishi majburiy!',
            'seriya.required' => 'Seriya kiritilishi majburiy!',
            'bitiruv_ishi.required' => 'Bitiruv ishi nomi kiritilishi majburiy!',
            'uqish_vaqti.required' => 'O\'qish vaqti kiritilishi majburiy!',
            'baholar.required' => 'Baholar kiritilishi majburiy!',
            'haqida.required' => 'Batafsil ma\'lumot kiritilishi majburiy!',
        ]);


        $tinglovchi_diploms = new Tinglovchi_diplom();
        $tinglovchi_diploms->klassifikatsiya = $request->klassifikatsiya;
        $tinglovchi_diploms->seriya = $request->seriya;
        $tinglovchi_diploms->bitiruv_ishi = $request->bitiruv_ishi;
        $tinglovchi_diploms->uqish_vaqti = $request->uqish_vaqti;
        $tinglovchi_diploms->baholar = $request->baholar;
        $tinglovchi_diploms->haqida = $request->haqida;
        $tinglovchi_diploms->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Tinglovchi_diplom::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'klassifikatsiya' => 'required',
            'seriya' => 'required',
            'bitiruv_ishi' => 'required',
            'uqish_vaqti' => 'required',
            'baholar' => 'required',
            'haqida' => 'required',
        ],[
            'klassifikatsiya.required' => 'Klassifikatsiya nomi kiritilishi majburiy!',
            'seriya.required' => 'Seriya kiritilishi majburiy!',
            'bitiruv_ishi.required' => 'Bitiruv ishi nomi kiritilishi majburiy!',
            'uqish_vaqti.required' => 'O\'qish vaqti kiritilishi majburiy!',
            'baholar.required' => 'Baholar kiritilishi majburiy!',
            'haqida.required' => 'Batafsil ma\'lumot kiritilishi majburiy!',
        ]);

        $tinglovchi_diploms = Tinglovchi_diplom::find($id);
        $tinglovchi_diploms->klassifikatsiya = $request->klassifikatsiya;
        $tinglovchi_diploms->seriya = $request->seriya;
        $tinglovchi_diploms->bitiruv_ishi = $request->bitiruv_ishi;
        $tinglovchi_diploms->uqish_vaqti = $request->uqish_vaqti;
        $tinglovchi_diploms->baholar = $request->baholar;
        $tinglovchi_diploms->haqida = $request->haqida;
        $tinglovchi_diploms->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
