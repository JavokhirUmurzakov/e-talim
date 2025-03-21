<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fakultet_kafedra;
use App\Models\Xonalar;
use Illuminate\Http\Request;

class XonalarController extends Controller
{

    public function index(){
        $xona = Xonalar::leftJoin('xonalars as x', 'xonalars.parent_id', '=', 'x.id')
            ->leftjoin('fakultet_kafedras' ,'xonalars.fakultet_kafedra_id' ,'=', 'fakultet_kafedras.id')
            ->where('fakultet_kafedras.ohtm_id', auth()->user()->ohtm_id)
            ->select('xonalars.parent_id',
                'xonalars.id',
                'xonalars.nomi',
                'xonalars.haqida',
                'xonalars.fakultet_kafedra_id',
                'fakultet_kafedras.nomi as fak_kafedra_nomi',
                'x.nomi as parent_name'
            )
            ->paginate(10);
        $xonalar_select = Xonalar::leftJoin('xonalars as x', 'xonalars.parent_id', '=', 'x.id')
            ->leftjoin('fakultet_kafedras' ,'xonalars.fakultet_kafedra_id' ,'=', 'fakultet_kafedras.id')
            ->where('fakultet_kafedras.ohtm_id', auth()->user()->ohtm_id)
            ->select(
                'xonalars.parent_id',
                'xonalars.id',
                'xonalars.nomi',
            )->get()->keyBy('id');

        $fks = Fakultet_kafedra::where('ohtm_id', auth()->user()->ohtm_id)->get();
        return view('ohtm_uquv_bulimi.xonalar', compact('xona', 'fks', 'xonalar_select'));

    }
    public function create(Request $request){
        $request->validate([
            'nomi' => 'required|max:255',
            'haqida' => 'required',
            'parent_id' => 'nullable',
            'fakultet_kafedra_id' => 'required|integer',
        ],[
            'nomi.required' => 'Xonani nomi kiritilishi majburiy!',
            'nomi.max' => 'Xona nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'haqida.required' => 'Batafsil ma\'lumot kiritilishi majburiy!',
            'fakultet_kafedra_id.required' => 'Fakultet yoki kafedra tanlash majburiy!',
        ]);

        $xona = new Xonalar();
        $xona->nomi = $request->nomi;
        $xona->haqida = $request->haqida;
        if($request->parent_id == "Tanlash..."){
            $xona->parent_id = null     ;
        }else $xona->parent_id = $request->parent_id;
        $xona->fakultet_kafedra_id=$request->fakultet_kafedra_id;
        $xona->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete(Request $request)
    {
        // Xonani topish
        $item = Xonalar::find($request->id);

        // Agar xona topilmasa, xatolik qaytarish
        if (!$item) {
            return redirect()->back()->withErrors("Xona topilmadi!");
        }

        // Agar ushbu xonaga bog‘langan boshqa ma'lumotlar bo‘lsa, xatolikni oldini olish
        try {
            $item->delete();
            return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors("Xonani o‘chirishning iloji yo‘q! Bog‘langan ma'lumotlar mavjud.");
        }
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'nomi' => 'required|max:255',
            'haqida' => 'required',
            'parent_id' => 'nullable',
            'fakultet_kafedra_id' => 'required|integer',
        ],[
            'nomi.required' => 'Xonani nomi kiritilishi majburiy!',
            'nomi.max' => 'Xona nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'haqida.required' => 'Batafsil ma\'lumot kiritilishi majburiy!',
            'fakultet_kafedra_id.required' => 'Fakultet yoki kafedra tanlash majburiy!',
        ]);

        $xona = Xonalar::find($id);
        $xona->nomi = $request->nomi;
        $xona->haqida = $request->haqida;
        if($request->parent_id == "Tanlash..."){
            $xona->parent_id = null;
        }else $xona->parent_id = $request->parent_id;
        $xona->fakultet_kafedra_id=$request->fakultet_kafedra_id;
        $xona->save();
//        dd($xona->haqida);
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}

