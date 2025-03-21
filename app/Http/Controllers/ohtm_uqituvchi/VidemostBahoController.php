<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use App\Models\Ohtm;
use App\Models\Tinglovchi;
use App\Models\Videmost;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\PDF;

class VidemostBahoController extends Controller
{
    public function index($id)
    {
        $videmost = Videmost::leftJoin('videmost_bahos','videmosts.id','=','videmost_bahos.videmost_id')
            ->leftJoin('tinglovchis','videmost_bahos.tinglovchi_id','=','tinglovchis.id')
            ->leftJoin('jurnals','videmosts.jurnal_id','=','jurnals.id')
            ->leftJoin('uquv_yili_ohtms','uquv_yili_ohtms.id','=','jurnals.uquv_yili_ohtm_id')
            ->leftJoin('guruhs','guruhs.id','=','jurnals.guruh_id')
            ->leftJoin('kurs_bosqiches','kurs_bosqiches.id','=','guruhs.kurs_bosqiches_id')
            ->leftJoin('fanlars','fanlars.id','=','jurnals.fanlar_id')
            ->leftJoin('ohtms','fanlars.ohtm_id','=','ohtms.id')
            ->leftJoin('harbiy_unvons','videmosts.uquv_bulim_boshliq_unvon_id','=','harbiy_unvons.id')

            ->where(['videmosts.id'=> $id])
            ->select(
                'ohtms.nomi as ohtm_nomi',
                'videmosts.nomer',
                'uquv_yili_ohtms.nomi as uquv_yili_nomi',
                'kurs_bosqiches.nomi as kurs_nomi',
                'guruhs.nomi as guruh_nomi',
                'fanlars.nomi as fan_nomi',
                'videmosts.yakuniy_oluvchi',
                'videmosts.sana',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'videmosts.uquv_bulim_boshliq',
                'videmosts.xulosa',
                'videmosts.jami_tinglovchi',
                'videmosts.alo',
                'videmosts.yaxshi',
                'videmosts.qoniqarli',
                'videmosts.qoniqarsiz',
                'videmosts.baholanmagan'
            )
            ->first();

        $joriy_uqituvchi=Videmost::leftJoin('uqituvchis','videmosts.joriy_uqituvchi_id','=','uqituvchis.id')
            ->leftJoin('harbiy_unvons','uqituvchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->where(['ohtm_id'=>auth()->user()->ohtm_id,
//                'fakultet_kafedra_id'=>auth()->user()->uqituvchi->fakultet_kafedra_id,
                'videmosts.id'=>$id])
            ->select(
                'uqituvchis.fio as joriy_fio',
                'harbiy_unvons.qs_nomi as unvon_qs_nomi'
            )->first();
//        dd($joriy_uqituvchi);

        $oraliq_uqituvchi=Videmost::leftJoin('uqituvchis','videmosts.oraliq_uqituvchi_id','=','uqituvchis.id')
            ->leftJoin('harbiy_unvons','uqituvchis.harbiy_unvon_id','=','harbiy_unvons.id')
            ->where(['ohtm_id'=>auth()->user()->ohtm_id,
//                'fakultet_kafedra_id'=>auth()->user()->uqituvchi->fakultet_kafedra_id,
                'videmosts.id'=>$id])
            ->select(
                'uqituvchis.fio as oraliq_fio',
                'harbiy_unvons.qs_nomi as unvon_qs_nomi'
            )->get()->first();
//        dd($videmost);

        return view('ohtm_uqituvchi.videmost_baho', [
            'videmost' => $videmost,
            'joriy_uqituvchi' => $joriy_uqituvchi,
            'oraliq_uqituvchi' => $oraliq_uqituvchi,
//            'kursants'=>$kursants

        ]);
    }

    // DOCX yaratish
    public function generateDOCX()
    {
        try {
            $tinglovchi = Tinglovchi::leftJoin('harbiy_unvons', 'tinglovchis.harbiy_unvon_id', '=', 'harbiy_unvons.id')
                ->leftJoin('yakuniy_bahos', 'yakuniy_bahos.tinglovchi_id', '=', 'tinglovchis.id')
                ->leftJoin('bahos', 'yakuniy_bahos.baho_id', '=', 'bahos.id')
                ->select(
                    'tinglovchis.fio',
                    'harbiy_unvons.nomi as harbiy_unvon_nomi',
                    'bahos.nomi as baho_nomi'
                )
                ->get();
            $phpWord = new PhpWord();
            $section = $phpWord->addSection([
                'pageSizeW' => 12240, // A4 format (210mm)
                'pageSizeH' => 15840, // A4 format (297mm)
            ]);

            // Card ichidagi matnlarni qo‘shish
            $section->addText("O'zbekiston Respublikasi MV AKT va AHI", ['bold' => true, 'size' => 16], ['alignment' => 'center']);
            $section->addText("2607-sonli", ['size' => 12], ['alignment' => 'center']);
            $section->addText("RETING NAZORAT (O'ZLASHTIRISH) QAYDNOMASI", ['bold' => true, 'size' => 14], ['alignment' => 'center']);
            $section->addText("2024-2025 o'quv yili 5-bosqich 9-semestr 1-vzvod AT-5/4-20-guruh", ['size' => 12], ['alignment' => 'center']);
            $section->addTextBreak();

            $section->addText("Fan nomi: Web texnologiyalari", ['size' => 12]);

            $section->addText("Joriy nazorat oluvchi: k-n Komilov A.A.");
            $section->addText("Oraliq nazorat oluvchi: k-n Komilov A.A.");
            $section->addText("Yakuniy nazorat oluvchi: k-n Yusupov B.K., k-n Komilov A.A., k-n Boboyev N.T.");
            $section->addText("Yakuniy nazorat o'tkazilgan sana: 10.12.2024");
            $section->addTextBreak();

            // Jadval yaratish
            $tableStyle = [
                'borderSize' => 6,        // Border qalinligi (pt)
                'borderColor' => '000000', // Border rangi (qora)
                'cellMargin' => 50        // Ichki masofa
            ];
            $table = $section->addTable($tableStyle);

            // Sarlavha qatori
            $table->addRow();
            $table->addCell(500)->addText("T/r");
            $table->addCell(2000)->addText("Harbiy unvoni");
            $table->addCell(3000)->addText("FIO");
            $table->addCell(2000)->addText("Joriy nazorat");
            $table->addCell(2000)->addText("Oraliq nazorat");
            $table->addCell(2000)->addText("Yakuniy nazorat");
            $table->addCell(2000)->addText("Umumiy ball");
            $table->addCell(2000)->addText("Baho");

            $students = [
                ['harbiy_unvon_nomi' => 'Kapitan', 'fio' => 'Aliyev Alisher', 'joriy' => 20, 'oraliq' => 25, 'yakuniy' => 30],
                ['harbiy_unvon_nomi' => 'Leytenant', 'fio' => 'Karimov Bekzod', 'joriy' => 18, 'oraliq' => 20, 'yakuniy' => 28],
                ['harbiy_unvon_nomi' => 'Kapitan', 'fio' => 'Raxmonov Islom', 'joriy' => 22, 'oraliq' => 27, 'yakuniy' => 32],
            ];

            // Talabalar ma'lumotlarini qo‘shish
            foreach ($students as $key => $student) {
                $table->addRow();
                $table->addCell(500)->addText($key + 1);
                $table->addCell(2000)->addText($student['harbiy_unvon_nomi']);
                $table->addCell(3000)->addText($student['fio']);
                $table->addCell(2000)->addText($student['joriy']);
                $table->addCell(2000)->addText($student['oraliq']);
                $table->addCell(2000)->addText($student['yakuniy']);
                $table->addCell(2000)->addText($student['joriy'] + $student['oraliq'] + $student['yakuniy']);
                $table->addCell(2000)->addText(($student['joriy'] + $student['oraliq'] + $student['yakuniy']) >= 70 ? 'A' : 'B');
            }

            $section->addTextBreak();
            $section->addText("O'quv bo'limi boshlig'i: mayor N.Kuzibekov", ['bold' => true, 'size' => 12]);

            // Faylni yaratish
            $fileName = 'vedmos_baho_jadvali.docx';
            $objWriter = IOFactory::createWriter($phpWord, 'Word2010');
            $objWriter->save(storage_path($fileName));

            return response()->download(storage_path($fileName))->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            return view('ohtm_uqituvchi.videmost_baho', compact('tinglovchi'))->with('error', 'Fayl yaratishda xatolik yuz berdi!');
        }
    }

}
