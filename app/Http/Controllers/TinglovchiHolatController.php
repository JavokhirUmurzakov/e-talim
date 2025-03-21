<?php

namespace App\Http\Controllers;
use App\Models\Tinglovchi_holat;
use Illuminate\Http\Request;

class TinglovchiHolatController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $tinglovchi_holats = Tinglovchi_holat::all();

        return view('mv_admin.tinglovchi_holat', compact('tinglovchi_holats'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Tinglovchi holat nomi kiritilishi majburiy!',
            'nomi.max' => 'Tinglovchi holat nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);


        $tinglovchi_holats = new Tinglovchi_holat();
        $tinglovchi_holats->nomi = $request->nomi;
        $tinglovchi_holats->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Tinglovchi_holat::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Tinglovchi holat nomi kiritilishi majburiy!',
            'nomi.max' => 'Tinglovchi holat nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);

        $tinglovchi_holats = Tinglovchi_holat::where('id',$id)->first() ;
        $tinglovchi_holats->nomi = $request->nomi;
        $tinglovchi_holats->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
