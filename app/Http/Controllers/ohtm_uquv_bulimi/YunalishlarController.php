<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Ohtm;
use App\Models\Yunalishlar;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;


class YunalishlarController extends Controller
{

    public function index()
    {
        $yunalish = Yunalishlar::leftJoin('ohtms', 'ohtms.id', '=', 'yunalishlars.ohtm_id')
            ->select('yunalishlars.id as yun_id',
                'yunalishlars.nomi',
                'yunalishlars.qs_nomi',
                'yunalishlars.shifr',
                'yunalishlars.haqida',
                'yunalishlars.fanlar',
                'yunalishlars.logo',
                'yunalishlars.faol',
                'yunalishlars.ohtm_id',
                'ohtms.qs_nomi as ohtm_nomi')
            ->orderBy('yun_id', 'desc')
            ->paginate(10);



//        $ohtms = Ohtm::all()->select('id', 'qs_nomi');

        return view('ohtm_uquv_bulimi.yunalishlar', compact('yunalish'));
    }

    public function create(Request $request)
    {
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'shifr' => 'required',
            'fanlar' => 'required',
            'haqida' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ], [
            'nomi.required' => 'Yo\'nalish nomi kiritilishi majburiy!',
            'nomi.max' => 'Yo\'nalish nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Yo\'nalish qisqartma nomining kiritilishi majburiy!',
            'shifr.required' => 'Yo\'nalish shifri kiritilishi majburiy!',
            'fanlar.required' => 'Fanlar kiritilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
        ]);

        $uploadFile = $request->file('logo');
        $file_name = $uploadFile->hashName();
        $path = $uploadFile->storeAs('/images', $file_name);

        $yunalish = new Yunalishlar(['ohtm_id' => auth()->user()->ohtm_id]);
        $yunalish->nomi = $request->nomi;
        $yunalish->qs_nomi = $request->qs_nomi;
        $yunalish->shifr = $request->shifr;
        $yunalish->haqida = $request->haqida;
        $yunalish->fanlar = $request->fanlar;
        $yunalish->logo =$path;
        $yunalish->faol = is_null($request->faol) ? false : $request->faol;

        $yunalish->save();
        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }

    public function delete(Request $request)
    {
        $item = Yunalishlar::find($request->id);
        $item->delete();


        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
            'shifr' => 'required',
            'fanlar' => 'required',
            'haqida' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ], [
            'nomi.required' => 'Yo\'nalish nomi kiritilishi majburiy!',
            'nomi.max' => 'Yo\'nalish nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Yo\'nalish qisqartma nomining kiritilishi majburiy!',
            'shifr.required' => 'Yo\'nalish shifri kiritilishi majburiy!',
            'fanlar.required' => 'Fanlar kiritilishi majburiy!',
            'haqida.required' => "Batafsil maydoni to'ldirilishi majburiy!",
            'logo.image' => "Yo'nalish logosi faqat rasm fayli bo‘lishi kerak!",
            'logo.mimes' => "Rasm formati faqat JPEG, PNG, JPG, yoki GIF bo‘lishi kerak!",
            'logo.max' => "Rasm hajmi 2MB dan oshmasligi kerak!",
        ]);

        $yunalish = Yunalishlar::findOrFail($id);

        $rasmPath = $yunalish->logo; // Eski rasm yo‘qolmasligi uchun

        if ($request->hasFile('logo')) {
            if ($yunalish->logo && file_exists(storage_path('app/public/' . $yunalish->logo))) {
                unlink(storage_path('app/public/' . $yunalish->logo));
            }

            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $rasmPath = $file->storeAs('uploads/logos', $fileName, 'public');
        }

        $yunalish->update([
            'nomi' => $request->nomi,
            'qs_nomi' => $request->qs_nomi,
            'shifr' => $request->shifr,
            'haqida' => $request->haqida,
            'fanlar' => $request->fanlar,
            'logo' => $rasmPath,
            'faol' => $request->has('faol') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', "Ma'lumot yangilandi!");
    }

}
