<?php

namespace App\Http\Controllers;


use App\Models\Ohtm;
use App\Models\Uquv_yili;
use App\Models\Uquv_yili_ohtm;
use Illuminate\Http\Request;

class UquvYiliOhtmController extends Controller
{
    public function index(){

//        $uquvy = Uquv_yili_ohtm::with('uquv_yili', 'ohtm')->get();

        $uquvy   = Uquv_yili_ohtm::leftJoin('uquv_yilis as uqs', 'uquv_yili_ohtms.uquv_yili_id', '=', 'uqs.id')
            ->leftJoin('ohtms as o', 'uquv_yili_ohtms.ohtm_id', '=', 'o.id')
            ->select(
                'uquv_yili_ohtms.boshlanishi',
                'uquv_yili_ohtms.tugashi',
                'uquv_yili_ohtms.faol',
                'uquv_yili_ohtms.uquv_yili_id',
                'uqs.nomi as uquvy_nomi',
                'uquv_yili_ohtms.id as uquv_yili_id',
                'o.nomi as ohtm_nomi'
            )
            ->get();

        $ohtms = Ohtm::select('id', 'qs_nomi')->get();
        $uquv = Uquv_yili::select('id', 'nomi')->get();

        return view('mv_admin.uquv_yili_ohtm', compact('uquvy','ohtms', 'uquv'));

    }

    public function create(Request $request){
//       dd($request);

        $request->validate([
            'ohtm_id' => 'required',
            'uquv_yili_id' => 'required',
            'boshlanishi' => 'required',
            'tugashi' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'uquv_yili_id.required' => 'O`quv yili tanlash majburiy!',
            'boshlanishi.required' => 'O`quv yilini boshlanishi tanlash majburiy!',
            'tugashi.required' => 'O`quv yilini tugashi tanlash majburiy!',
        ]);



        $uquvy = new Uquv_yili_ohtm();
        $uquvy->boshlanishi = $request->boshlanishi;
        $uquvy->tugashi = $request->tugashi;
        $uquvy->faol = $request->faol;
        $uquvy->ohtm_id = $request->ohtm_id;
        $uquvy->uquv_yili_id = $request->uquv_yili_id;
        $uquvy->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete(Request $request){

        $item = Uquv_yili_ohtm::find($request->id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'ohtm_id' => 'required',
            'uquv_yili_id' => 'required',
            'boshlanishi' => 'required',
            'tugashi' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'uquv_yili_id.required' => 'O`quv yili tanlash majburiy!',
            'boshlanishi.required' => 'O`quv yilini boshlanishi tanlash majburiy!',
            'tugashi.required' => 'O`quv yilini tugashi tanlash majburiy!',
        ]);

        $uquvy = Uquv_yili_ohtm::find($id);
        $uquvy->boshlanishi = $request->boshlanishi;
        $uquvy->tugashi = $request->tugashi;
        $uquvy->faol = $request->faol;
        $uquvy->ohtm_id = $request->ohtm_id;
        $uquvy->uquv_yili_id = $request->uquv_yili_id;
        $uquvy->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
