<?php

namespace App\Http\Controllers;

use App\Models\Uquv_turi;
use Illuminate\Http\Request;

class UquvTuriController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $uquv_turis = Uquv_turi::all();

        return view('mv_admin.uquv_turi', compact('uquv_turis'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'O\'quv turi nomi kiritilishi majburiy!',
            'nomi.max' => 'O\'quv turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);


        $uquv_turis = new Uquv_turi();
        $uquv_turis->nomi = $request->nomi;
        $uquv_turis->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Uquv_turi::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'O\'quv turi nomi kiritilishi majburiy!',
            'nomi.max' => 'O\'quv turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);

        $uquv_turis = Uquv_turi::where('id',$id)->first();
        $uquv_turis->nomi = $request->nomi;
        $uquv_turis->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
