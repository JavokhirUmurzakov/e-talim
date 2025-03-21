<?php

namespace App\Http\Controllers;

use App\Models\Nashr_turi;
use App\Models\Role;
use Illuminate\Http\Request;

class NashrTuriController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $nashr_turis = Nashr_turi::all();

        return view('mv_admin.nashr_turi', compact('nashr_turis'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'ball' => 'required',
        ],[
            'nomi.required' => 'Nashr turi  kiritilishi majburiy!',
            'nomi.max' => 'Nashr turining uzunligi 255 ta belgidan oshmasligi kerak!',
            'ball.required' => 'Ball kiritikishi  majburiy!',
        ]);


        $nashr_turis = new Nashr_turi();
        $nashr_turis->nomi = $request->nomi;
        $nashr_turis->ball = $request->ball;
        $nashr_turis->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Nashr_turi::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'ball' => 'required',
        ],[
            'nomi.required' => 'Nashr turi kiritilishi majburiy!',
            'nomi.max' => 'Nashr turining uzunligi 255 ta belgidan oshmasligi kerak!',
            'ball.required' => 'Ball kiritikishi majburiy!',
        ]);

        $nashr_turis = Nashr_turi::find($id);
        $nashr_turis->nomi = $request->nomi;
        $nashr_turis->ball = $request->ball;
        $nashr_turis->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
