<?php

namespace App\Http\Controllers;

use App\Models\Tinglovchi_holat;
use App\Models\Uquv_turi;
use App\Models\Uquv_yili;
use Illuminate\Http\Request;

class UquvYiliController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $uquv_yilis = Uquv_yili::all();

        return view('mv_admin.uquv_yili', compact('uquv_yilis'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'O\'quv yili nomi kiritilishi majburiy!',
            'nomi.max' => 'O\'quv yili nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);


        $uquv_yilis = new Uquv_yili();
        $uquv_yilis->nomi = $request->nomi;
        $uquv_yilis->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Uquv_yili::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
        ],[
            'nomi.required' => 'O\'quv yili nomi kiritilishi majburiy!',
            'nomi.max' => 'O\'quv yili nomining uzunligi 255 ta belgidan oshmasligi kerak!',
        ]);

        $uquv_yilis = Uquv_yili::where('id',$id)->first();
        $uquv_yilis->nomi = $request->nomi;
        $uquv_yilis->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
