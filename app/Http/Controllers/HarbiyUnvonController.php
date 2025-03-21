<?php

namespace App\Http\Controllers;

use App\Models\Harbiy_unvon;
use App\Models\Ilmiy_unvon;
use Illuminate\Http\Request;

class HarbiyUnvonController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $harbiy_unvons = Harbiy_unvon::all();

        return view('mv_admin.harbiy_unvon', compact('harbiy_unvons'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Harbiy unvon nomi kiritilishi majburiy!',
            'nomi.max' => 'Harbiy unvonning uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Harbiy unvon qisqartma nomi kiritilishi majburiy!',
        ]);


        $harbiy_unvons = new Harbiy_unvon();
        $harbiy_unvons->nomi = $request->nomi;
        $harbiy_unvons->qs_nomi = $request->qs_nomi;
        $harbiy_unvons->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Harbiy_unvon::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Harbiy unvon nomi kiritilishi majburiy!',
            'nomi.max' => 'Harbiy unvonning uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Harbiy unvon qisqartma nomi kiritilishi majburiy!',
        ]);

        $harbiy_unvons = Harbiy_unvon::where('id',$id)->first();
        $harbiy_unvons->nomi = $request->nomi;
        $harbiy_unvons->qs_nomi = $request->qs_nomi;
        $harbiy_unvons->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
