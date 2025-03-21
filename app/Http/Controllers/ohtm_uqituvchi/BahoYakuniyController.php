<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Baho;
use App\Models\Dars_kun;
use App\Models\Jurnal;
use App\Models\Mavzu;
use App\Models\Tinglovchi;
use App\Models\Yakuniy;
use App\Models\YakuniyBaho;
use Illuminate\Http\Request;

class BahoYakuniyController extends Controller
{
    public function index($jurnal_id){

        $jurnal = Jurnal::where('id', $jurnal_id)->first();
        $ohtm_id = auth()->user()->ohtm_id;
        $tinglovchis = Tinglovchi::where(['guruh_id'=>$jurnal->guruh_id, 'ohtm_id'=>auth()->user()->ohtm_id])->get();
        $yakuniys = Yakuniy::with('baholar')->where(['jurnal_id'=>$jurnal_id, 'ohtm_id'=>$ohtm_id])
          ->get();
        $bahos = Baho::orderBy('id')->get();
        $baho_array = $bahos->keyBy('id')->toArray();


        return view('ohtm_uqituvchi.baho_yakuniy', compact('jurnal', 'yakuniys', 'tinglovchis', 'bahos', 'baho_array'));
    }
    public function create(Request $request)
    {

        $request->validate([
            'yakuniy_id' => 'required',
            'baho_id' => 'required',
            'tinglovchi_id' => 'required',
        ]);
        $model = new YakuniyBaho();
        $model->yakuniy_id = $request->yakuniy_id;
        $model->baho_id = $request->baho_id;
        $model->tinglovchi_id = $request->tinglovchi_id;
        $model->save();

        return redirect()->back()->withSuccess("baho qo'yildi");

    }

    public function edit(Request $request, $id)
    {

        $curBaho = YakuniyBaho::find($id);

        $request->validate([
            'yakuniy_id' => 'required',
            'baho_id' => 'required',
            'tinglovchi_id' => 'required',
        ]);

        $curBaho->update([
            'yakuniy_id'=>$request->yakuniy_id,
            'baho_id'=>$request->baho_id,
            'tinglovchi_id'=>$request->tinglovchi_id
        ]);
        return redirect()->back()->withSuccess("baho o'zgartirildi");
    }

}
