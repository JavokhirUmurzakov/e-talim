<?php

namespace App\Http\Controllers;

use App\Models\Ilmiy_daraja;
use App\Models\Ilmiy_unvon;
use Illuminate\Http\Request;

class IlmiyDarajaController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $ilmiy_darajas = Ilmiy_daraja::all();

        return view('mv_admin.ilmiy_daraja', compact('ilmiy_darajas'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Ilmiy daraja nomi kiritilishi majburiy!',
            'nomi.max' => 'Ilmiy darajaning uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Ilmiy daraja qisqartma nomi kiritilishi majburiy!',
        ]);


        $ilmiy_darajas = new Ilmiy_daraja();
        $ilmiy_darajas->nomi = $request->nomi;
        $ilmiy_darajas->qs_nomi = $request->qs_nomi;
        $ilmiy_darajas->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Ilmiy_daraja::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Ilmiy daraja nomi kiritilishi majburiy!',
            'nomi.max' => 'Ilmiy darajaning uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Ilmiy daraja qisqartma nomi kiritilishi majburiy!',
        ]);

        $ilmiy_darajas = Ilmiy_daraja::where('id',$id)->first();
        $ilmiy_darajas->nomi = $request->nomi;
        $ilmiy_darajas->qs_nomi = $request->qs_nomi;
        $ilmiy_darajas->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
