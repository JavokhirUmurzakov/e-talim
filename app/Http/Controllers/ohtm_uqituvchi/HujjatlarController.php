<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\YillikReja;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Hujjatlar;
use App\Models\Fanlar;
use App\Models\HujjatTuri;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HujjatlarController extends Controller
{
    public function index($jurnal_id)
    {
        $hujjatlars = Hujjatlar::leftjoin('hujjat_turis', 'hujjat_turi_id', '=', 'hujjat_turis.id')
            ->leftjoin('jurnals', 'hujjatlars.jurnal_id', '=', 'jurnals.id')
            ->leftjoin('fanlars', 'jurnals.fanlar_id', '=', 'fanlars.id')
            ->where('fanlars.ohtm_id', auth()->user()->ohtm_id)
            ->where('hujjatlars.jurnal_id', $jurnal_id)
            ->select(
                'hujjatlars.*',
                'hujjatlars.id',
                'hujjat_turis.name as hujjat_turi_nomi',
                'fanlars.nomi as jurnal_nomi',
                'hujjatlars.nomi',
                'hujjatlars.file_name',
                'hujjatlars.file_path',
            )

            ->paginate(10);

//        dd($hujjatlars);
        $jurnal_nomi = Fanlar::all();
        $hujjat_tur = HujjatTuri::all();



        return view('ohtm_uqituvchi.hujjat', compact('hujjatlars', 'hujjat_tur', 'jurnal_nomi', 'jurnal_id'));
    }
    public function create(Request $request)
    {

        $request->validate([
            'hujjat_nomi' => 'required',
            'hujjat_turi' => 'required|integer',
            'file' => 'required',
        ], [
            'hujjat_nomi' => 'Hujjat nomini kiritish majburiy',
            'hujjat_turi' => 'Hujjat turini kiritish majburiy',
            'file' => 'File yuklash majburiy',
        ]);
        DB::transaction(function () use ($request) {
            $uploadFile = $request->file('file');
            $file_name = $uploadFile->getClientOriginalName();
            $file_hash = $uploadFile->hashName();
            $file_path = $uploadFile->storeAs('/hujjats', $file_hash);
            $hujjat = new Hujjatlar();
            $hujjat->nomi = $request->hujjat_nomi;
            $hujjat->hujjat_turi_id = $request->hujjat_turi;
            $hujjat->jurnal_id = $request->jurnal_id;
            $hujjat->file_name = $file_name;
            $hujjat->file_path = $file_path;
            $hujjat->save();
        });


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete($id)
    {

        try {
            $hujjat = Hujjatlar::find($id);
            $hujjat->delete();
            Storage::delete($hujjat->file_path);
        }catch (QueryException $e){
            return redirect()->back()->withErrors("Bu Hujjat jarayonda");
        }


        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'hujjat_nomi' => 'required',
            'hujjat_turi' => 'required|integer',
            'jurnal_nomi' => 'required|integer',
        ], [
            'hujjat_nomi' => 'Hujjat nomini kiritish majburiy',
            'hujjat_turi' => 'Hujjat turini kiritish majburiy',
            'jurnal_nomi' => 'Jurnal nomini kiritish majburiy',
        ]);
        $hujjat = Hujjatlar::find($id);
        $uploadFile = $request->file('file');
        if (!is_null($uploadFile)) {
            $file_name = $uploadFile->getClientOriginalName();
            $file_hash = $uploadFile->hashName();
            $file_path = $uploadFile->storeAs('/hujjats', $file_hash);
            $hujjat->file_name = $file_name;
            $hujjat->file_path = $file_path;
        }
        $hujjat->nomi = $request->hujjat_nomi;
        $hujjat->hujjat_turi_id = $request->hujjat_turi;
        $hujjat->jurnal_id = $request->jurnal_nomi;
        $hujjat->save();

        return redirect()->back()->withSuccess("Ma'lumot o'zgartirildi!");
    }
}
