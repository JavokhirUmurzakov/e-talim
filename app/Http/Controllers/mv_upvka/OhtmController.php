<?php

namespace App\Http\Controllers\mv_upvka;

use App\Http\Controllers\Controller;
use App\Models\Ohtm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OhtmController extends Controller
{
    public function index(){
        $ohtms = Ohtm::all();
        return view('mv_upvka.crud.ohtm', compact('ohtms'));
    }


    public function create(Request $request){
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'haqida' => 'required',
            'logo' => 'required',
        ],[
            'nomi.required' => 'OHTM nomi kiritilishi majburiy!',
            'nomi.max' => 'OHTM nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'OHTM qisqartma nomi kiritilishi majburiy!',
            'haqida.required' => 'Batafsil ma\'lumot biriktirilishi majburiy!',
            'logo.required' => "Fayl biriktirilishi majburiy!",
        ]);



        DB::transaction(function () use ($request) {
            $file = $request->file('pdf');

//        $nomi1 = $file->getClientOriginalName();
//        $qsrtma = $file->getClientOriginalExtension();

        $pdf_nomi_int =strtotime(Carbon::now()->toDateTimeString());

//        $yangi_pdf = $pdf_nomi_int.'_'.$nomi1;
//        $path = $file->storeAs('storage',$yangi_pdf, 'public');

            $ohtms = new Ohtm;
            $ohtms->nomi = $request->nomi;
            $ohtms->qs_nomi = $request->qs_nomi;
            $ohtms->haqida = $request->haqida;
            $ohtms->logo = $request->logo;
            $ohtms->save();
            if($ohtms->save()){
                Schema::connection('pgsql')->create('baho'. $ohtms->id, function($table)
                {
                    $table->increments('id');
                    $table->unsignedBigInteger('dars_kun_id');
                    $table->unsignedBigInteger('baho_id');
                    $table->unsignedBigInteger('tinglovchi_id');
                    $table->timestamps();
                });
            }

        });

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($request){
        $item = Ohtm::where('id', $request)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'haqida' => 'required',
            'logo' => 'required',
        ],[
            'nomi.required' => 'OHTM nomi kiritilishi majburiy!',
            'nomi.max' => 'OHTM nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'OHTM qisqartma nomi kiritilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
            'logo.required' => "Fayl biriktirilishi majburiy!",
        ]);

        $ohtms = Ohtm::find($id);

        $ohtms->nomi = $request->nomi;
        $ohtms->qs_nomi = $request->qs_nomi;
        $ohtms->haqida = $request->haqida;
        $ohtms->logo = $request->logo;

        $ohtms->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
