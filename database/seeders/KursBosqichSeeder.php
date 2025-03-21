<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KursBosqichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kurs_bosqiches')->insert([
            'nomi'=>'4-kurs'
        ]);
        DB::table('kurs_bosqiches')->insert([
            'nomi'=>'5-kurs'
        ]);
        DB::table('kurs_bosqiches')->insert([
            'nomi'=>'3-kurs'
        ]);
        DB::table('kurs_bosqiches')->insert([
            'nomi'=>'2-kurs'
        ]);
        DB::table('kurs_bosqiches')->insert([
            'nomi'=>'1-kurs'
        ]);

    }
}
