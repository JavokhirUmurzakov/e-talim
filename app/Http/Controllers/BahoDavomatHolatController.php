<?php

namespace App\Http\Controllers;

use App\Models\Baho_davomat_holat;
use App\Models\Kurs_bosqich;
use Illuminate\Http\Request;

class BahoDavomatHolatController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $baho_davomat_holats = Baho_davomat_holat::all();

        return view('mv_admin.baho_davomat_holati', compact('baho_davomat_holats'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Baho davomat holati kiritilishi majburiy!',
            'nomi.max' => 'Baho davomat holatining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);


        $baho_davomat_holats = new Baho_davomat_holat();
        $baho_davomat_holats->nomi = $request->nomi;
        $baho_davomat_holats->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Baho_davomat_holat::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Baho davomat holati kiritilishi majburiy!',
            'nomi.max' => 'Baho davomat holatining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);

        $baho_davomat_holats = Baho_davomat_holat::where('id',$id)->first();
        $baho_davomat_holats->nomi = $request->nomi;
        $baho_davomat_holats->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
