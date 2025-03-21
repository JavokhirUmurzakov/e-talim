<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class YuklamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('yuklamas')->insert([
            'uquv_yili_ohtm_id'=>'1',
            'fan_uqituvchi_id'=>'2',
            'umumiy_soat'=>'60',
            'utilgan_soat'=>'10',
            'mashgulot_turi_soat'=>'20',
            'uquv_rejasi'=>'hammasi nazorat ostida'
        ]);
        DB::table('yuklamas')->insert([
            'uquv_yili_ohtm_id'=>'1',
            'fan_uqituvchi_id'=>'2',
            'umumiy_soat'=>'100',
            'utilgan_soat'=>'10',
            'mashgulot_turi_soat'=>'50',
            'uquv_rejasi'=>'hammasi nazorat ostida'
        ]);
        DB::table('yuklamas')->insert([
            'uquv_yili_ohtm_id'=>'2',
            'fan_uqituvchi_id'=>'1',
            'umumiy_soat'=>'80',
            'utilgan_soat'=>'30',
            'mashgulot_turi_soat'=>'40',
            'uquv_rejasi'=>'hammasi nazorat ostida'
        ]);

    }
}
