<?php

namespace App\Http\Controllers;

use App\Models\Kurs_holat;
use Illuminate\Http\Request;

class KursHolatController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $kurs_holats = Kurs_holat::all();

        return view('mv_admin.kurs_holat', compact('kurs_holats'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Kurs holati kiritilishi majburiy!',
            'nomi.max' => 'Kurs holatining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);


        $kurs_holats = new Kurs_holat();
        $kurs_holats->nomi = $request->nomi;
        $kurs_holats->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Kurs_holat::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Kurs holati kiritilishi majburiy!',
            'nomi.max' => 'Kurs holatining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);

        $kurs_holats = Kurs_holat::where('id',$id)->first();
        $kurs_holats->nomi = $request->nomi;
        $kurs_holats->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
