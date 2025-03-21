<?php

namespace App\Http\Controllers;

use App\Models\Fak_kaf_turi;
use App\Models\Fakultet_kafedra;
use App\Models\Ohtm;
use Illuminate\Http\Request;

class FakultetKafedraController extends Controller
{
    public function index(){

//        $fakkaf = Fakultet_kafedra::leftJoin('fak_kaf_turis', 'fakultet_kafedras.fak_kaf_turi_id', '=', 'fak_kaf_turis.id')
//            ->leftJoin('ohtms', 'fakultet_kafedras.ohtm_id', '=', 'ohtms.id')
//            ->leftJoin('fakultet_kafedras as parent', 'fakultet_kafedras.parent_id', '=', 'parent.id')
//            ->select('fakultet_kafedras.id as fakk_id', 'fakultet_kafedras.nomi', 'fakultet_kafedras.qs_nomi', 'fakultet_kafedras.haqida',
//                'fakultet_kafedras.kod',  'fakultet_kafedras.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi', 'fakultet_kafedras.fak_kaf_turi_id',
//                'fak_kaf_turis.nomi as fkturi_nomi', 'fakultet_kafedras.parent_id' )
//            ->orderBy('fakk_id','desc')
//            ->paginate(10);

//// Query to select data from fakultet_kafedra and join related tables
//        $results = DB::table('fakultet_kafedra')
//            ->leftJoin('fak_kaf_turi', 'fakultet_kafedra.fak_kaf_turi_id', '=', 'fak_kaf_turi.id')
//            ->leftJoin('ohtm', 'fakultet_kafedra.ohtm_id', '=', 'ohtm.id')
//            ->leftJoin('fakultet_kafedra as parent', 'fakultet_kafedra.parent_id', '=', 'parent.id')
//            ->select(
//                'fakultet_kafedra.*',
//                'fak_kaf_turi.name as fak_kaf_turi_name',
//                'ohtm.name as ohtm_name',
//                'parent.nomi as parent_nomi'
//            )
//            ->get();
//
//// Print or use the results
//    dd($fakkaf);


//        $results1 = Fakultet_kafedra::leftJoin('fak_kaf_turis as fkt', 'fakultet_kafedras.fak_kaf_turi_id', '=', 'fkt.id')
//            ->leftJoin('ohtms as o', 'fakultet_kafedras.ohtm_id', '=', 'o.id')
//            ->leftJoin('fakultet_kafedras as parent', 'fakultet_kafedras.parent_id', '=', 'parent.id')
//            ->select(
//                'fakultet_kafedras.id AS fakultet_kafedra_id',
//                'fakultet_kafedras.nomi AS fakultet_kafedra_nomi',
//                'fakultet_kafedras.qs_nomi AS fakultet_kafedra_qs_nomi',
//                'fakultet_kafedras.haqida AS fakultet_kafedra_haqiqa',
//                'fakultet_kafedras.kod AS fakultet_kafedra_kod',
//                'fkt.nomi AS fak_kaf_turi_name',
//                'o.nomi AS ohtm_name',
//                'parent.nomi AS parent_nomi'
//            )
//            ->get();

// Print or use the results

        $fakkaf = Fakultet_kafedra::with('fak_kaf_turi', 'parent','ohtm')
//            ->select('fakultet_kafedras.id', 'ohtms.qs_nomi as ohtm_qs_nomi', 'fak_kaf_turis.nomi as fak_kaf_turi_nomi','fakultet_kafedras.nomi','fakultet_kafedras.qs_nomi','fakultet_kafedras.kod')
            ->get();

        $bshlar = Fakultet_kafedra::leftJoin('fak_kaf_turis', 'fak_kaf_turis.id', '=', 'fakultet_kafedras.fak_kaf_turi_id')
            ->where('fak_kaf_turis.boshqarma','1')->select('fakultet_kafedras.id','fakultet_kafedras.qs_nomi')->get();
//dd($fakkaf[0]->fak_kaf_turi->nomi);
        $ohtms = Ohtm::select('id', 'qs_nomi')->get();
        $fak_kaf_turi = Fak_kaf_turi::select('id', 'nomi','boshqarma')->get();

        return view('mv_admin.fakultet_kafedra', compact('fakkaf','ohtms', 'fak_kaf_turi','bshlar'));

    }

    public function create(Request $request){
//        dd($request);
        $request->validate([
            'ohtm_id' => 'required',
            'fak_kaf_turi_id' => 'required',
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'haqida' => 'required',
            'kod' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
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
        $fakkaf->ohtm_id = $request->ohtm_id;
        $fakkaf->fak_kaf_turi_id = $request->fak_kaf_turi_id;
        if($request->parent_id == "Tanlash...")
            $fakkaf->parent_id = null;
        else
            $fakkaf->parent_id = $request->parent_id;
        $fakkaf->save();

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
            'ohtm_id' => 'required',
            'fak_kaf_turi_id' => 'required',
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'haqida' => 'required',
            'kod' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
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
        $fakkaf->ohtm_id = $request->ohtm_id;
        $fakkaf->fak_kaf_turi_id = $request->fak_kaf_turi_id;
        if($request->parent_id == "Tanlash...")
            $fakkaf->parent_id = null;
        else
            $fakkaf->parent_id = $request->parent_id;
        $fakkaf->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
