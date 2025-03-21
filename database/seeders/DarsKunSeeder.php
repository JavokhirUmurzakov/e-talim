<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DarsKunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dars_kuns')->insert([
            'jurnal_id' => '1',
            'sana' => '12.02.2024',
            'nazorat_turi_id'=>'1',
            'ohtm_id' => '1',
            'mavzu_id' => '1',
            'uqituvchi_id'=>'1',

        ]);
        DB::table('dars_kuns')->insert([
            'jurnal_id' => '2',
            'sana' => '12.02.2024',
            'nazorat_turi_id'=>'1',
            'ohtm_id' => '2',
            'mavzu_id' => '2',
            'uqituvchi_id'=>'2',

        ]);
    }
}
