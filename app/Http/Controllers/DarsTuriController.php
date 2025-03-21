<?php

namespace App\Http\Controllers;

use App\Models\Dars_turi;
use Illuminate\Http\Request;

class DarsTuriController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $dars_turis = Dars_turi::all();

        return view('mv_admin.dars_turi', compact('dars_turis'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Dars turi nomi kiritilishi majburiy!',
            'nomi.max' => 'Dars turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);


        $dars_turis = new Dars_turi();
        $dars_turis->nomi = $request->nomi;
        $dars_turis->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Dars_turi::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Dars turi nomi kiritilishi majburiy!',
            'nomi.max' => 'Dars turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);

        $dars_turis = Dars_turi::find($id);
        $dars_turis->nomi = $request->nomi;
        $dars_turis->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
