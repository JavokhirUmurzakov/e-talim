<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Til;
use Illuminate\Http\Request;

class TilController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $tils = Til::all();

        return view('mv_admin.til', compact('tils'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Til nomi kiritilishi majburiy!',
            'nomi.max' => 'Til nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Til nomi qisqartmasi kiritilishi majburiy!',
        ]);


        $tils = new Til();
        $tils->nomi = $request->nomi;
        $tils->qs_nomi = $request->qs_nomi;
        $tils->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Til::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Til nomi kiritilishi majburiy!',
            'nomi.max' => 'Til nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Til nomi qisqartmasi kiritilishi majburiy!',
        ]);

        $tils = Til::find($id);
        $tils->nomi = $request->nomi;
        $tils->qs_nomi = $request->qs_nomi;
        $tils->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
