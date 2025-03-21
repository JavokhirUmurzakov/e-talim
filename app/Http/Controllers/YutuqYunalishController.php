<?php

namespace App\Http\Controllers;

use App\Models\Nashr_turi;
use App\Models\Yutuq_yunalish;
use Illuminate\Http\Request;

class YutuqYunalishController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $yutuq_yunalishes = Yutuq_yunalish::all();

        return view('mv_admin.yutuq_yunalishi', compact('yutuq_yunalishes'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'ball' => 'required',
        ],[
            'nomi.required' => 'Yutuq yo\'nalishi kiritilishi majburiy!',
            'nomi.max' => 'Yutuq yo\'nalishining uzunligi 255 ta belgidan oshmasligi kerak!',
            'ball.required' => 'Ball kiritikishi  majburiy!',
        ]);


        $yutuq_yunalishes = new Yutuq_yunalish();
        $yutuq_yunalishes->nomi = $request->nomi;
        $yutuq_yunalishes->ball = $request->ball;
        $yutuq_yunalishes->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete( $id){
        $item = Yutuq_yunalish::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'ball' => 'required',
        ],[
            'nomi.required' => 'Yutuq yo\'nalishi kiritilishi majburiy!',
            'nomi.max' => 'Yutuq yo\'nalishining uzunligi 255 ta belgidan oshmasligi kerak!',
            'ball.required' => 'Ball kiritikishi majburiy!',
        ]);

        $yutuq_yunalishes = Yutuq_yunalish::find($id);
        $yutuq_yunalishes->nomi = $request->nomi;
        $yutuq_yunalishes->ball = $request->ball;
        $yutuq_yunalishes->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
