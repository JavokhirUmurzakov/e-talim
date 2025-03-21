<?php

namespace App\Http\Controllers\mv_upvka;

use App\Http\Controllers\Controller;
use App\Models\Ilmiy_unvon;
use Illuminate\Http\Request;

class UnvonController extends Controller
{
    public function index()
    {
        $ilmiy_unvons = Ilmiy_unvon::all();
        return view('mv_upvka.crud.unvons', compact('ilmiy_unvons'));
    }

    public function create( Request $request)
    {
        $request->validate([
            'nomi'=>'required',
            'qs_nomi'=>'required'
        ]);
        Ilmiy_unvon::create([
            'nomi'=>$request->nomi,
            'qs_nomi'=>$request->qs_nomi
        ]);

        return redirect()->back()->withSuccess("Ma'lumot yaratildi!");

    }

    public function delete($unvon_id)
    {
        $unvon = Ilmiy_unvon::where('id', $unvon_id)->first();
        $unvon->delete();
        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $unvon_id)
    {
        $unvon = Ilmiy_unvon::where('id', $unvon_id)->first();
        $request->validate([
            'nomi'=>'required',
            'qs_nomi'=>'required'
        ]);

        $unvon->update([
            'nomi'=>$request->nomi,
            'qs_nomi'=>$request->qs_nomi
        ]);
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
