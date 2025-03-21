<?php

namespace App\Http\Controllers;

use App\Models\Harbiy_unvon;
use App\Models\Uqituvchi_holat;
use Illuminate\Http\Request;

class UqituvchiHolatController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $uqituvchi_holats = Uqituvchi_holat::all();

        return view('mv_admin.uqituvchi_holat', compact('uqituvchi_holats'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'O\'qituvchi holati kiritilishi majburiy!',
            'nomi.max' => 'O\'qituvchi holatining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'O\'qituvchi holati kiritilishi majburiy!',
        ]);


        $uqituvchi_holats = new Uqituvchi_holat();
        $uqituvchi_holats->nomi = $request->nomi;
        $uqituvchi_holats->qs_nomi = $request->qs_nomi;
        $uqituvchi_holats->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Uqituvchi_holat::where('id', $id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'O\'qituvchi holati kiritilishi majburiy!',
            'nomi.max' => 'O\'qituvchi holatining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'O\'qituvchi holati kiritilishi majburiy!',
        ]);

        $uqituvchi_holats = Uqituvchi_holat::find($id);
        $uqituvchi_holats->nomi = $request->nomi;
        $uqituvchi_holats->qs_nomi = $request->qs_nomi;
        $uqituvchi_holats->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
