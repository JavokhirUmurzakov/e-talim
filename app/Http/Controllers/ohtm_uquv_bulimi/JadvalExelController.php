<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Jadval_exel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadvalExelController extends Controller
{
    // Jadval ro‘yxatini chiqarish
    public function index()
    {

        $jadval = Jadval_exel::where('ohtm_id', auth()->user()->ohtm_id)
            ->select('id', 'nomi', 'file', 'sana')
            ->get();
//dd($jadval);
        return view('ohtm_uquv_bulimi.jadval_exel', compact('jadval'));
    }

    // Yangi jadval qo‘shish
    public function create(Request $request)
    {
        $request->validate([
            'nomi' => 'required|max:255',
            'file' => 'required|mimes:xls,xlsx|max:40960', // required bo‘lishi kerak
            'sana' => 'required|date',
        ], [
            'nomi.required' => 'Nashr turi nomi kiritilishi majburiy!',
            'nomi.max' => 'Nashr turi nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'file.required' => 'Fayl tanlash majburiy!',
            'file.mimes' => 'Faqat Excel formatdagi fayllarni yuklang! (.xls, .xlsx)',
        ]);

        $jadval = new Jadval_exel();
        $jadval->nomi = $request->nomi;
        $jadval->sana = $request->sana;
        $jadval->ohtm_id = auth()->user()->ohtm_id;

        // Faylni yuklash
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Faylni storage/app/public/jadval_exel ichiga yuklaymiz
        $filePath = $file->storeAs('jadval_exel', $fileName, 'public');

        $jadval->file = $filePath; // Faqat nisbiy yo‘lni saqlash
        $jadval->save();

        return redirect()->back()->withSuccess("Ma'lumot qo‘shildi!");
    }


    public function delete($id)
    {
        $item = Jadval_exel::findOrFail($id);

        // Faylni o‘chirish
        if ($item->file && Storage::exists('uploads/jadval_exel/' . $item->file)) {
            Storage::delete('uploads/jadval_exel/' . $item->file);
        }

        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o‘chirildi!");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'nomi' => 'required|max:255',
            'sana' => 'required|date',
            'file' => 'nullable|mimes:ppt,pptx,doc,docx,pdf|max:40960',
        ], [
            'nomi.required' => "Jadval haqida ma'lumot kiritilishi majburiy!",
            'nomi.max' => "Jadval haqida ma'lumotning uzunligi 255 ta belgidan oshmasligi kerak!",
        ]);

        $jadval = Jadval_exel::findOrFail($id);
        $jadval->nomi = $request->nomi;
        $jadval->sana = $request->sana;
        $jadval->ohtm_id = auth()->user()->ohtm_id;

        // Agar foydalanuvchi yangi fayl yuklamasa, eski faylni saqlaymiz
        if ($request->hasFile('file')) {
            $directory = 'uploads/jadval_exel';

            // Eski faylni o‘chirish
            if ($jadval->file && Storage::exists($directory . '/' . $jadval->file)) {
                Storage::delete($directory . '/' . $jadval->file);
            }

            // Yangi faylni yuklash
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs($directory, $fileName, 'public');
            $jadval->file = $fileName;
        } else {
            // Agar yangi fayl yuklanmasa, eski faylni saqlab qolamiz
            $jadval->file = $request->old_file;
        }

        $jadval->save();

        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

}
