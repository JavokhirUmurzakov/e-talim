<?php

namespace App\Http\Controllers;

use App\Models\Ohtm;
use App\Models\Qabul_statistika;
use App\Models\Xabarlar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QabulStatistikaController extends Controller
{
    public function index(){
        $qabs = Qabul_statistika::leftJoin('ohtms', 'ohtms.id', '=', 'qabul_statistikas.ohtm_id')
            ->select('qabul_statistikas.id as qab_id', 'qabul_statistikas.qabul_yili', 'qabul_statistikas.abituriyentlar_soni', 'qabul_statistikas.qabul_soni',  'qabul_statistikas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
            ->orderBy('qab_id','desc')
            ->paginate(10);

        $ohtms = Ohtm::all()->select('id', 'qs_nomi');

        return view('mv_admin.qabul_statistika', compact('qabs','ohtms'));
    }

    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'ohtm_id' => 'required',
            'qabul_yili' => 'required',
            'abituriyentlar_soni' => 'required',
            'qabul_soni' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'qabul_yili.required' => 'Qabul yili kiritilishi majburiy!',
            'abituriyentlar_soni.required' => 'Abituriyentlar soni kiritilishi majburiy!',
            'qabul_soni.required' => 'Qabul soni kiritilishi majburiy!',
        ]);



        $qabs = new Qabul_statistika();
        $qabs->qabul_yili = $request->qabul_yili;
        $qabs->abituriyentlar_soni = $request->abituriyentlar_soni;
        $qabs->qabul_soni = $request->qabul_soni;
        $qabs->ohtm_id = $request->ohtm_id;
        $qabs->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete(Request $request){
        $item = Qabul_statistika::find($request->id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {

        $request->validate([
            'ohtm_id' => 'required',
            'qabul_yili' => 'required',
            'abituriyentlar_soni' => 'required',
            'qabul_soni' => 'required',
        ],[
            'ohtm_id.required' => 'Ohtm tanlash majburiy!',
            'qabul_yili.required' => 'Qabul yili kiritilishi majburiy!',
            'abituriyentlar_soni.required' => 'Abituriyentlar soni kiritilishi majburiy!',
            'qabul_soni.required' => 'Qabul soni kiritilishi majburiy!',
        ]);

        $qabs = Qabul_statistika::find($id);
        $qabs->qabul_yili = $request->qabul_yili;
        $qabs->abituriyentlar_soni = $request->abituriyentlar_soni;
        $qabs->qabul_soni = $request->qabul_soni;
        $qabs->ohtm_id = $request->ohtm_id;
        $qabs->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
