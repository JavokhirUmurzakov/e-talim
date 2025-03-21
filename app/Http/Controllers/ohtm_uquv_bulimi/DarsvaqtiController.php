<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Dars_vaqti;
use Illuminate\Http\Request;

class DarsvaqtiController extends Controller
{
    public function index()
    {
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);

        $dars_vaqtis = Dars_vaqti::all();
        return view('ohtm_uquv_bulimi.dars_vaqti', compact('dars_vaqtis'));
    }


    public function create(Request $request)
    {
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'vaqti' => 'required',
            'boshlanishi' => 'required',
            'tugashi' => 'required',
        ], [
            'nomi.required' => 'Dars nomi kiritilishi majburiy!',
            'nomi.max' => 'Dars nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'vaqti.required' => 'Dars vaqti kiritilishi majburiy!',
        ]);


        $dars_vaqtis = new Dars_vaqti();
        $dars_vaqtis->nomi = $request->nomi;
        $dars_vaqtis->vaqti = $request->vaqti;
        $dars_vaqtis->boshlanishi = $request->boshlanishi;
        $dars_vaqtis->tugashi = $request->tugashi;
        $dars_vaqtis->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete($id)
    {
        $item = Dars_vaqti::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'vaqti' => 'required',
            'boshlanishi' => 'required',
            'tugashi' => 'required',
        ], [
            'nomi.required' => 'Dars nomi kiritilishi majburiy!',
            'nomi.max' => 'Dars nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'vaqti.required' => 'Dars vaqti kiritilishi majburiy!',
        ]);

        $dars_vaqtis = Dars_vaqti::find($id);
        $dars_vaqtis->nomi = $request->nomi;
        $dars_vaqtis->vaqti = $request->vaqti;
        $dars_vaqtis->boshlanishi = $request->boshlanishi;
        $dars_vaqtis->tugashi = $request->tugashi;
        $dars_vaqtis->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
