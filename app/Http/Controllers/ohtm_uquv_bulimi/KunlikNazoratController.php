<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fakultet_kafedra;
use App\Models\KunlikNazorat;
use App\Models\Uqituvchi_yutuqlar;
use App\Models\Uquv_yili_ohtm;
use App\Models\Xonalar;
use App\Models\Yutuq_yunalish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KunlikNazoratController extends Controller
{
    public function index()
    {
        $fak_kaf = Fakultet_kafedra::where('fakultet_kafedras.ohtm_id', auth()->user()->ohtm_id)->get();
//        dd($fak_kaf);
        $uquv_yili_ohtm = Uquv_yili_ohtm::where('uquv_yili_ohtms.ohtm_id', auth()->user()->ohtm_id)->get();
        $xonalar=Xonalar::leftJoin('fakultet_kafedras','xonalars.fakultet_kafedra_id','fakultet_kafedras.id')
            ->select('xonalars.id',
            'xonalars.nomi')
        ->where('fakultet_kafedras.ohtm_id', auth()->user()->ohtm_id)->get();

        $fakultets=Fakultet_kafedra::where(['ohtm_id'=>auth()->user()->ohtm_id])->get();
//        dd($fakultets);

        $kunlik_nazorat = KunlikNazorat::leftJoin('fakultet_kafedras','kunlik_nazorats.fakultet_kafedra_id','fakultet_kafedras.id')
            ->leftJoin('xonalars','kunlik_nazorats.xona_id','xonalars.id')
            ->leftJoin('uquv_yili_ohtms','kunlik_nazorats.uquv_yili_ohtm_id','uquv_yili_ohtms.id')
            ->select(
                'kunlik_nazorats.id',
                'xonalars.nomi as xona',
                'fakultet_kafedras.nomi as kafedra',
                'kunlik_nazorats.vaqti as vaqti',
                'kunlik_nazorats.fayl as fayl',
                'kunlik_nazorats.haqida as haqida',
                'kunlik_nazorats.korildi as korildi',

            )
            ->get();
//        dd($kunlik_nazorat);



        return view('ohtm_uquv_bulimi.kunlik_nazorat',compact('xonalar','fak_kaf','uquv_yili_ohtm','fakultets','kunlik_nazorat'));
    }

    public function create(Request $request)
    {
        DB::transaction(function () use ($request) {
            $uploadFile = $request->file('file');
            $file_hash = $uploadFile->hashName();
            $fayl = $uploadFile->storeAs('/kunlik-nazorat-fayllari', $file_hash);
            $kunlik_nazorat = new KunlikNazorat();
            $kunlik_nazorat->haqida = $request->haqida;
            $kunlik_nazorat->fakultet_kafedra_id = $request->fakultet_kafedra_id;
            $kunlik_nazorat->uquv_yili_ohtm_id = $request->ohtm_uquv_yili;
            $kunlik_nazorat->xona_id = $request->xona_turi;
            $kunlik_nazorat->fayl= $fayl;
            $kunlik_nazorat->vaqti=  $request->vaqti;
            $kunlik_nazorat->korildi=  false;
            $kunlik_nazorat->save();
        });

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
//
    public function delete($id)
    {
//        dd($id);
        $item = KunlikNazorat::find($id);
        $item->delete();
        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
