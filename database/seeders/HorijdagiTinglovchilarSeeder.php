<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HorijdagiTinglovchilarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('horijdagi_tinglovchilars')->insert([
            'tinglovchi_id'=>1,
            'ohtm_id'=>1,
            'muassasa'=>'Akt va Ahi',
            'ketish_vaqti'=>'12.02.2025',
            'kelish_vaqti'=>'18.02.2025',
            'mutaxassislik'=>'IT',
            'diplom_pdf'=>'AB12345.pdf',
        ]);

        DB::table('horijdagi_tinglovchilars')->insert([
            'tinglovchi_id'=>1,
            'ohtm_id'=>2,
            'muassasa'=>'ChOTQIMBIO',
            'ketish_vaqti'=>'01.02.2024',
            'kelish_vaqti'=>'12.02.2024',
            'mutaxassislik'=>'IT',
            'diplom_pdf'=>'AA12345.pdf',
        ]);
    }
}
