<?php

namespace App\Http\Controllers\ohtm_tinglovchi;

use App\Http\Controllers\Controller;
use App\Models\Mavzu;
use App\Models\Tinglovchi;
use App\Models\Tinglovchi_yutuqlar;
use App\Models\Uquv_yili_ohtm;
use App\Models\Yutuq_yunalish;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class YutuqController extends Controller
{
    public function index()
    {
        $yutuq_turis = Yutuq_yunalish::all();
//            dd($yutuq_turis);
        $uquv_yili_ohtm = Uquv_yili_ohtm::all();
        $yutuq = Tinglovchi_yutuqlar::leftJoin('tinglovchis','tinglovchis.id','=','tinglovchi_yutuqlars.tinglovchi_id')
            ->where('tinglovchi_yutuqlars.tinglovchi_id',auth()->user()->tinglovchi->id)
            ->select(
                'tinglovchi_yutuqlars.*',
            )
            ->get();
//        dd($yutuq);
        return view('ohtm_tinglovchi.yutuqlar',compact('yutuq_turis','uquv_yili_ohtm','yutuq'));
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
            $fayl = $uploadFile->storeAs('/yutuqlar', $file_hash);
            $ting_yutuq = new Tinglovchi_yutuqlar();
            $ting_yutuq->haqida = $request->haqida;
            $ting_yutuq->yutuq_yunalish_id = $request->yutuq_turi;
            $ting_yutuq->uquv_yili_ohtm_id = $request->ohtm_uquv_yili;
            $ting_yutuq->tinglovchi_id = auth()->user()->tinglovchi->id;
            $ting_yutuq->fayl= $fayl;
            $ting_yutuq->save();
        });


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete($id)
    {
//        dd($id);
        $item = Tinglovchi_yutuqlar::find($id);
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
