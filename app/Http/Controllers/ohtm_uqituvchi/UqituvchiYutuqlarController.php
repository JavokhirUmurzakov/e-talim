<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Tinglovchi_yutuqlar;
use App\Models\Uqituvchi_yutuqlar;
use App\Models\Uquv_yili_ohtm;
use App\Models\Yutuq_yunalish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UqituvchiYutuqlarController extends Controller
{
    public function index()
    {
        $yutuq_turis = Yutuq_yunalish::all();
//            dd($yutuq_turis);
        $uquv_yili_ohtm = Uquv_yili_ohtm::all();
        $yutuq = Uqituvchi_yutuqlar::leftJoin('uqituvchis','uqituvchis.id','=','uqituvchi_yutuqlars.uqituvchi_id')
            ->where('uqituvchi_yutuqlars.uqituvchi_id',auth()->user()->uqituvchi->id)
            ->select(
                'uqituvchi_yutuqlars.*',
            )
            ->get();
//        dd($yutuq);
        return view('ohtm_uqituvchi.yutuqlar',compact('yutuq_turis','uquv_yili_ohtm','yutuq'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'yutuq_turi' => 'required|integer',
            'file' => 'required',
        ], [
            'yutuq_turi' => 'yutuq turini kiritish majburiy',
            'file' => 'File yuklash majburiy',
        ]);

        DB::transaction(function () use ($request) {
            $uploadFile = $request->file('file');
            $file_hash = $uploadFile->hashName();
            $fayl = $uploadFile->storeAs('/uqituvchi_yutuqlar', $file_hash);
            $uqt_yutuq = new Uqituvchi_yutuqlar();
            $uqt_yutuq->haqida = $request->haqida;
            $uqt_yutuq->yutuq_yunalish_id = $request->yutuq_turi;
            $uqt_yutuq->uquv_yili_ohtm_id = $request->ohtm_uquv_yili;
            $uqt_yutuq->uqituvchi_id = auth()->user()->uqituvchi->id;
            $uqt_yutuq->fayl= $fayl;
            $uqt_yutuq->save();
        });


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete($id)
    {
//        dd($id);
        $item = Uqituvchi_yutuqlar::find($id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
