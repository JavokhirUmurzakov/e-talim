<?php

namespace App\Http\Controllers\mv_upvka;

use App\Http\Controllers\Controller;
use App\Models\Ilmiy_daraja;
use Illuminate\Http\Request;

class DarajaController extends Controller
{
    public function index()
    {
        $ilmiy_darajas = Ilmiy_daraja::all();
        return view('mv_upvka.crud.daraja', compact('ilmiy_darajas'));
    }

    public function create( Request $request)
    {
        $request->validate([
            'nomi'=>'required',
            'qs_nomi'=>'required'
        ]);
        Ilmiy_daraja::create([
            'nomi'=>$request->nomi,
            'qs_nomi'=>$request->qs_nomi
        ]);

        return redirect()->back()->withSuccess("Ma'lumot yaratildi!");

    }

    public function delete($daraja_id)
    {
        $daraja = Ilmiy_daraja::where('id', $daraja_id)->first();
        $daraja->delete();
        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $daraja_id)
    {
        $daraja = Ilmiy_daraja::where('id', $daraja_id)->first();
        $request->validate([
            'nomi'=>'required',
            'qs_nomi'=>'required'
        ]);

        $daraja->update([
            'nomi'=>$request->nomi,
            'qs_nomi'=>$request->qs_nomi
        ]);
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
