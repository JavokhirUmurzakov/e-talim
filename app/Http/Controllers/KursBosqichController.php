<?php

namespace App\Http\Controllers;

use App\Models\Kurs_bosqich;
use App\Models\Kurs_holat;
use Illuminate\Http\Request;

class KursBosqichController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $kurs_bosqiches = Kurs_bosqich::all();

        return view('mv_admin.kurs_bosqich', compact('kurs_bosqiches'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Kurs bosqichi kiritilishi majburiy!',
            'nomi.max' => 'Kurs bosqichining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);


        $kurs_bosqiches = new Kurs_bosqich();
        $kurs_bosqiches->nomi = $request->nomi;
        $kurs_bosqiches->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Kurs_bosqich::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'Kurs bosqichi kiritilishi majburiy!',
            'nomi.max' => 'Kurs bosqichining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);

        $kurs_bosqiches = Kurs_bosqich::where('id',$id)->first();
        $kurs_bosqiches->nomi = $request->nomi;
        $kurs_bosqiches->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
