<?php

namespace App\Http\Controllers;

use App\Models\Ilmiy_unvon;
use Illuminate\Http\Request;

class IlmiyUnvonController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $ilmiy_unvons = Ilmiy_unvon::all();

        return view('mv_admin.ilmiy_unvon', compact('ilmiy_unvons'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Ilmiy unvon nomi kiritilishi majburiy!',
            'nomi.max' => 'Ilmiy unvonning uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Ilmiy unvon qisqartma nomi kiritilishi majburiy!',
        ]);


        $ilmiy_unvons = new Ilmiy_unvon();
        $ilmiy_unvons->nomi = $request->nomi;
        $ilmiy_unvons->qs_nomi = $request->qs_nomi;
        $ilmiy_unvons->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Ilmiy_unvon::where('id',$id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Ilmiy unvon nomi kiritilishi majburiy!',
            'nomi.max' => 'Ilmiy unvonning uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Ilmiy unvon qisqartma nomi kiritilishi majburiy!',
        ]);

        $ilmiy_unvons = Ilmiy_unvon::where('id',$id)->first();
        $ilmiy_unvons->nomi = $request->nomi;
        $ilmiy_unvons->qs_nomi = $request->qs_nomi;
        $ilmiy_unvons->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
