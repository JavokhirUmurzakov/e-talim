<?php

namespace App\Http\Controllers;

use App\Models\Ohtm;
use App\Models\Xabarlar;
use App\Models\Yunalishlar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class YunalishlarController extends Controller
{
    public function index(){
        $yunalish = Yunalishlar::leftJoin('ohtms', 'ohtms.id', '=', 'yunalishlars.ohtm_id')
            ->select('yunalishlars.id as yun_id', 'yunalishlars.nomi', 'yunalishlars.qs_nomi', 'yunalishlars.shifr',
                'yunalishlars.haqida', 'yunalishlars.fanlar', 'yunalishlars.logo', 'yunalishlars.faol',
                'yunalishlars.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
            ->orderBy('yun_id','desc')
            ->paginate(10);

        $ohtms = Ohtm::all()->select('id', 'qs_nomi');

        return view('mv_admin.yunalishlar', compact('yunalish','ohtms'));
    }

    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'ohtm_id' => 'required',
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'shifr' => 'required',
            'fanlar' => 'required',
            'haqida' => 'required',
            'logo' => 'required',
            'faol' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'nomi.required' => 'Yo\'nalish nomi kiritilishi majburiy!',
            'nomi.max' => 'Yo\'nalish nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Yo\'nalish qisqartma nomining kiritilishi majburiy!',
            'shifr.required' => 'Yo\'nalish shifri kiritilishi majburiy!',
            'fanlar.required' => 'Fanlar kiritilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
            'logo.required' => "Yo'nalish logosi kiritilishi majburiy!",
            'faol.required' => "Faolligi belgilanish majburiy!",
        ]);



        $yunalish = new Yunalishlar;
        $yunalish->nomi = $request->nomi;
        $yunalish->qs_nomi = $request->qs_nomi;
        $yunalish->shifr = $request->shifr;
        $yunalish->haqida = $request->haqida;
        $yunalish->fanlar = $request->fanlar;
        $yunalish->logo = $request->logo;
        $yunalish->faol = $request->faol;
        $yunalish->ohtm_id = $request->ohtm_id;
        $yunalish->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete(Request $request){
        $item = Yunalishlar::find($request->id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'ohtm_id' => 'required',
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'shifr' => 'required',
            'fanlar' => 'required',
            'haqida' => 'required',
            'logo' => 'required',
            'faol' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'nomi.required' => 'Yo\'nalish nomi kiritilishi majburiy!',
            'nomi.max' => 'Yo\'nalish nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Yo\'nalish qisqartma nomining kiritilishi majburiy!',
            'shifr.required' => 'Yo\'nalish shifri kiritilishi majburiy!',
            'fanlar.required' => 'Fanlar kiritilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
            'logo.required' => "Yo'nalish logosi kiritilishi majburiy!",
            'faol.required' => "Faolligi belgilanish majburiy!",
        ]);

        $yunalish = Yunalishlar::find($id);
        $yunalish->nomi = $request->nomi;
        $yunalish->qs_nomi = $request->qs_nomi;
        $yunalish->shifr = $request->shifr;
        $yunalish->haqida = $request->haqida;
        $yunalish->fanlar = $request->fanlar;
        $yunalish->logo = $request->logo;
        $yunalish->faol = $request->faol;
        $yunalish->ohtm_id = $request->ohtm_id;
        $yunalish->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
