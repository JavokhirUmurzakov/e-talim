<?php

namespace App\Http\Controllers;

use App\Models\Fak_kaf_turi;
use App\Models\Ohtm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FakKafTuriController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $fak_kaf_turis = Fak_kaf_turi::orderby('id','desc')->get();

        return view('mv_admin.fak_kaf_turi', compact('fak_kaf_turis'));
    }


    public function create(Request $request){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
//            'boshqarma' => 'required',
        ],[
            'nomi.required' => 'Fakultet kafedra turi nomi kiritilishi majburiy!',
            'nomi.max' => 'Fakultet kafedra turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
//            'boshqarma.required' => 'Boshqarma maydon nomini kiritilishi majburiy!',
        ]);


        $fak_kaf_turis = new Fak_kaf_turi();
        $fak_kaf_turis->nomi = $request->nomi;
        if($request->boshqarma == 'on'){
            $fak_kaf_turis->boshqarma = 1;
        }
        $fak_kaf_turis->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Fak_kaf_turi::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
//            'boshqarma' => 'required',
        ],[
            'nomi.required' => 'Fakultet kafedra turi nomi kiritilishi majburiy!',
            'nomi.max' => 'Fakultet kafedra turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
//            'boshqarma.required' => 'Boshqarma maydon nomini kiritilishi majburiy!',
        ]);

        $fak_kaf_turis = Fak_kaf_turi::where('id', $id)->first();
        $fak_kaf_turis->nomi = $request->nomi;
        if($request->boshqarma == 'on'){
            $fak_kaf_turis->boshqarma = 1;
        }
        else {
            $fak_kaf_turis->boshqarma = 0;
        }

        $fak_kaf_turis->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
