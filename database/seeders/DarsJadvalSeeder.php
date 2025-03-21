<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DarsJadvalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dars_jadvalis')->insert([
            'sana'=>'04.02.2015',
            'mavzu'=>'dasturlash',
            'guruh_id'=>'2',
            'dars_vaqti_id'=>'2',
            'dars_turi_id'=>'2',
            'fan_uqituvchi_id'=>'2',
            'xona_id'=>'1',
            'uquv_yili_ohtm_id'=>'2',
        ]);
        DB::table('dars_jadvalis')->insert([
            'sana'=>'04.02.2020',
            'mavzu'=>'algoritim',
            'guruh_id'=>'1',
            'dars_vaqti_id'=>'2',
            'dars_turi_id'=>'2',
            'fan_uqituvchi_id'=>'1',
            'xona_id'=>'2',
            'uquv_yili_ohtm_id'=>'1',
        ]);
        DB::table('dars_jadvalis')->insert([
            'sana'=>'04.02.2015',
            'mavzu'=>'web',
            'guruh_id'=>'1',
            'dars_vaqti_id'=>'1',
            'dars_turi_id'=>'2',
            'fan_uqituvchi_id'=>'2',
            'xona_id'=>'1',
            'uquv_yili_ohtm_id'=>'2',
        ]);

    }
}
