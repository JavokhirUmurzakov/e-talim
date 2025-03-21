<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kurs')->insert([
            'nomi'=>'5-kurs',
            'haqida'=>"yaxshi",
            'boshlanish_vaqti'=>'07.06.2023',
            'tugash_vaqti'=>'07.05.2025',
            'qabul_asos_pdf'=>'dsdasda.pdf',
            'bitiruv_asos_pdf'=>'dsdasda.pdf',
            'xorijiy_id'=>'1',
            'kurs_holat_id'=>'2',
            'uqituvchi_id'=>'2',
            'kurs_bosqiches_id'=>'2',
            'ohtm_id'=>'1',
            'uquv_turi_id'=>'1',
        ]);
        DB::table('kurs')->insert([
            'nomi'=>'4-kurs',
            'haqida'=>"yaxshi",
            'boshlanish_vaqti'=>'07.06.2024',
            'tugash_vaqti'=>'07.05.2027',
            'qabul_asos_pdf'=>'ddasdsdasda.pdf',
            'bitiruv_asos_pdf'=>'asddsdasda.pdf',
            'xorijiy_id'=>'2',
            'kurs_holat_id'=>'1',
            'uqituvchi_id'=>'1',
            'kurs_bosqiches_id'=>'1',
            'ohtm_id'=>'2',
            'uquv_turi_id'=>'1',
        ]);
        DB::table('kurs')->insert([
            'nomi'=>'5-kurs',
            'haqida'=>"yaxshi",
            'boshlanish_vaqti'=>'07.06.2021',
            'tugash_vaqti'=>'07.05.2024',
            'qabul_asos_pdf'=>'jhjdsdasda.pdf',
            'bitiruv_asos_pdf'=>'hjhdsdasda.pdf',
            'xorijiy_id'=>'2',
            'kurs_holat_id'=>'2',
            'uqituvchi_id'=>'1',
            'kurs_bosqiches_id'=>'2',
            'ohtm_id'=>'1',
            'uquv_turi_id'=>'2',
        ]);

    }
}
