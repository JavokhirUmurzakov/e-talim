<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fakultet_kafedra;
use App\Models\Fanlar;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class FanlarController extends Controller
{
    public function index(){

        $fak_kaf = Fakultet_kafedra::with('fak_kaf_turi', 'parent','ohtm')->where('ohtm_id', auth()->user()->ohtm_id)
            ->get();

        $fanlar = Fanlar::with('fakultet_kafedra')->where('ohtm_id', auth()->user()->ohtm_id)->get();

;
        return view('ohtm_uquv_bulimi.fanlar', compact('fak_kaf','fanlar'));

    }

    public function create(Request $request){
//        dd($request->all());
        $request->validate([
            'fakultet_kafedra_id' => 'required|integer',
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'kod' => 'required',
        ],[
            'fakultet_kafedra_id.required' => 'Fakultet yoki kafedra tanlash majburiy!',
            'nomi.required' => 'Fakultet kafedra nomi kiritilishi majburiy!',
            'nomi.max' => 'Fakultet kafedra nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Fakultet kafedra qisqartma nomi kiritilishi majburiy!',
            'kod.required' => 'Fakultet kafedra kod raqami kiritilishi majburiy!',
        ]);

        $fan = new Fanlar();

        $fan->nomi = $request->nomi;
        $fan->qs_nomi = $request->qs_nomi;
        $fan->kod = $request->kod;
        $fan->ohtm_id = auth()->user()->ohtm_id;
        $fan->faol = is_null($request->faol) ? false : $request->faol;
        $fan->fakultet_kafedra_id = $request->fakultet_kafedra_id;
        $fan->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete(Request $request){
        $item = Fanlar::find($request->id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'fakultet_kafedra_id' => 'required|integer',
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'kod' => 'required',
        ],[
            'fakultet_kafedra_id.required' => 'Fakultet yoki kafedra tanlash majburiy!',
            'nomi.required' => 'Fakultet kafedra nomi kiritilishi majburiy!',
            'nomi.max' => 'Fakultet kafedra nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Fakultet kafedra qisqartma nomi kiritilishi majburiy!',
            'kod.required' => 'Fakultet kafedra kod raqami kiritilishi majburiy!',
        ]);



        $fan = Fanlar::find($id);
        $fan->nomi = $request->nomi;
        $fan->qs_nomi = $request->qs_nomi;
        $fan->kod = $request->kod;
        $fan->ohtm_id = auth()->user()->ohtm_id;
        $fan->faol = is_null($request->faol) ? false : $request->faol;
        $fan->fakultet_kafedra_id = $request->fakultet_kafedra_id;
        $fan->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
