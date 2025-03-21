<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinglovchiDiplomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tinglovchi_diploms')->insert([
            'klassifikatsiya' => 'Bilmadim',
            'seriya'=>'A213123',
            'bitiruv_ishi'=>'Web dasturlash',
            'uqish_vaqti'=>'5 yil',
            'baholar'=>'alo',
            'haqida'=>'yaxshi',
        ]);
        DB::table('tinglovchi_diploms')->insert([
            'klassifikatsiya' => 'Bilmadim',
            'seriya'=>'B21876',
            'bitiruv_ishi'=>'OOP',
            'uqish_vaqti'=>'4 yil',
            'baholar'=>'alo',
            'haqida'=>'yaxshi',
        ]);
        DB::table('tinglovchi_diploms')->insert([
            'klassifikatsiya' => 'Bilmadim',
            'seriya'=>'AB233123',
            'bitiruv_ishi'=>'Web dasturlash',
            'uqish_vaqti'=>'5 yil',
            'baholar'=>'alo',
            'haqida'=>'namunali',
        ]);
    }
}
