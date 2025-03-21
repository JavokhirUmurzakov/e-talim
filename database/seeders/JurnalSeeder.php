<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("jurnals")->insert([
            'fanlar_id'=>1,
            'uquv_yili_ohtm_id'=>1,
            'guruh_id'=>1,
            'soat'=>90,
            'maruza'=>30,
            'amaliy'=>60,
            'oraliq'=>true,
            'yakuniy'=>true,
        ]);

        DB::table("jurnals")->insert([
            'fanlar_id'=>2,
            'uquv_yili_ohtm_id'=>2,
            'guruh_id'=>2,
            'soat'=>90,
            'maruza'=>30,
            'amaliy'=>60,
            'oraliq'=>true,
            'yakuniy'=>true,
        ]);
    }
}
