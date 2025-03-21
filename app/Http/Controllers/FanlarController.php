<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fanlar;
use App\Models\Fakultet_kafedra;

class FanlarController extends Controller
{
    public function index(){

        $fanlar = Fanlar::leftJoin('fakultet_kafedras', 'fakultet_kafedras.id', '=', 'fanlars.fakultet_kafedra_id')
            ->leftJoin('ohtms', 'ohtms.id', '=', 'fakultet_kafedras.ohtm_id')
            ->select(
                'fanlars.id',
                'fanlars.nomi',
                'fanlars.qs_nomi',
                'fanlars.kod',
                'fanlars.faol',
                'fanlars.fakultet_kafedra_id',
                DB::raw("CONCAT(ohtms.qs_nomi, ' - ', fakultet_kafedras.qs_nomi) as ohtm_fak")
            )
            ->orderBy('fanlars.id','desc')
            ->paginate(10);

        $fak_kaf = Fakultet_kafedra::leftJoin('ohtms', 'ohtms.id', '=', 'fakultet_kafedras.ohtm_id')
            ->select('fakultet_kafedras.id', DB::raw("CONCAT(ohtms.qs_nomi, ' - ', fakultet_kafedras.qs_nomi) as ohtm_fak"))
            ->get();

        return view('mv_admin.fanlar', compact('fanlar','fak_kaf'));
    }

    public function create(Request $request){

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'kod' => 'required',
            'fakultet_kafedra_id' => 'required',
        ],[
            'nomi.required' => 'fan nomi kiritilishi majburiy!',
            'nomi.max' => 'Fan nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Fan qisqartma nomi kiritilishi majburiy!',
            'kod.required' => 'Fan kodi biriktirilishi majburiy!',
            'fakultet_kafedra_id.required' => "Fakultet kafedra kiritilishi majburiy!",
        ]);

        $fan = new Fanlar;
        $fan->nomi = $request->nomi;
        $fan->qs_nomi = $request->qs_nomi;
        $fan->kod = $request->kod;
        $fan->fakultet_kafedra_id = $request->fakultet_kafedra_id;

        if($request->faol == 'on'){
            $fan->faol = 1;
        }

        $fan->save();


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }



    public function edit(Request $request, $id){

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'kod' => 'required',
            'fakultet_kafedra_id' => 'required',
        ],[
            'nomi.required' => 'fan nomi kiritilishi majburiy!',
            'nomi.max' => 'Fan nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Fan qisqartma nomi kiritilishi majburiy!',
            'kod.required' => 'Fan kodi biriktirilishi majburiy!',
            'fakultet_kafedra_id.required' => "Fakultet kafedra kiritilishi majburiy!",
        ]);

        $fan = Fanlar::find($id);

        $fan->nomi = $request->nomi;
        $fan->qs_nomi = $request->qs_nomi;
        $fan->kod = $request->kod;
        $fan->fakultet_kafedra_id = $request->fakultet_kafedra_id;

        if($request->faol == 'on'){
            $fan->faol = 1;
        }
        else {
            $fan->faol = 0;
        }
        $fan->save();
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

    public function delete(Request $request){

        $item = Fanlar::find($request->id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
