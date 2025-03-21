<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fak_kaf_turi;
use App\Models\Fakultet_kafedra;
use App\Models\Ohtm;
use App\Models\Permission;
use App\Models\Uqituvchi;
use Illuminate\Http\Request;

class FakKafedraController extends Controller
{
    public function index(){

        $fakkaf = Fakultet_kafedra::with('fak_kaf_turi', 'parent','ohtm')->where('ohtm_id', auth()->user()->ohtm_id)
            ->get();

        $bshlar = Fakultet_kafedra::leftJoin('fak_kaf_turis', 'fak_kaf_turis.id', '=', 'fakultet_kafedras.fak_kaf_turi_id')
            ->where('fak_kaf_turis.boshqarma','1')->select('fakultet_kafedras.id','fakultet_kafedras.qs_nomi')->get();
        $ohtms = Ohtm::select('id', 'qs_nomi')->get();
        $fak_kaf_turi = Fak_kaf_turi::select('id', 'nomi','boshqarma')->get();

        return view('ohtm_uquv_bulimi.fakultet_kafedra', compact('fakkaf','ohtms', 'fak_kaf_turi','bshlar'));

    }

    public function create(Request $request){
//        dd($request);
        $request->validate([

            'fak_kaf_turi_id' => 'required',
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'haqida' => 'required',
            'kod' => 'required',
        ],[

            'fak_kaf_turi_id.required' => 'Fakultet yoki kafedra tanlash majburiy!',
            'nomi.required' => 'Fakultet kafedra nomi kiritilishi majburiy!',
            'nomi.max' => 'Fakultet kafedra nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Fakultet kafedra qisqartma nomi kiritilishi majburiy!',
            'haqida.required' => 'Batafsil ma\'lumot kiritilishi majburiy!',
            'kod.required' => 'Fakultet kafedra kod raqami kiritilishi majburiy!',
        ]);

        $fakkaf = new Fakultet_kafedra();

        $fakkaf->nomi = $request->nomi;
        $fakkaf->qs_nomi = $request->qs_nomi;
        $fakkaf->haqida = $request->haqida;
        $fakkaf->kod = $request->kod;
        $fakkaf->ohtm_id = auth()->user()->ohtm_id;
        $fakkaf->fak_kaf_turi_id = $request->fak_kaf_turi_id;
        if($request->parent_id == "Tanlash...")
            $fakkaf->parent_id = null;
        else
            $fakkaf->parent_id = $request->parent_id;
        $fakkaf->save();
//        if($fakkaf->save()){
//            Permission::create([
//                'user_id'=>$fakkaf->id,
//                'role_id'=>7
//            ]);
//        }
        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete(Request $request){
        $item = Fakultet_kafedra::find($request->id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'fak_kaf_turi_id' => 'required',
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'haqida' => 'required',
            'kod' => 'required',
        ],[
            'fak_kaf_turi_id.required' => 'Fakultet yoki kafedra tanlash majburiy!',
            'nomi.required' => 'Fakultet kafedra nomi kiritilishi majburiy!',
            'nomi.max' => 'Fakultet kafedra nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Fakultet kafedra qisqartma nomi kiritilishi majburiy!',
            'haqida.required' => 'Batafsil ma\'lumot kiritilishi majburiy!',
            'kod.required' => 'Fakultet kafedra kod raqami kiritilishi majburiy!',
        ]);

        $fakkaf = Fakultet_kafedra::find($id);
        $fakkaf->nomi = $request->nomi;
        $fakkaf->qs_nomi = $request->qs_nomi;
        $fakkaf->haqida = $request->haqida;
        $fakkaf->kod = $request->kod;
        $fakkaf->ohtm_id = auth()->user()->ohtm_id;
        $fakkaf->fak_kaf_turi_id = $request->fak_kaf_turi_id;
        if($request->parent_id == "Tanlash...")
            $fakkaf->parent_id = null;
        else
            $fakkaf->parent_id = $request->parent_id;
        $fakkaf->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
