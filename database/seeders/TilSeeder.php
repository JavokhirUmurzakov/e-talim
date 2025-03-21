<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tils')->insert([
            'nomi' => "O'zbek tili",
            'qs_nomi' => "O'z",
        ]);
        DB::table('tils')->insert([
            'nomi' => "Tojik tili",
            'qs_nomi' => "Tj",
        ]);
        DB::table('tils')->insert([
            'nomi' => "Qirg'iz tili",
            'qs_nomi' => "Qr",
        ]);
        DB::table('tils')->insert([
            'nomi' => "Rus tili",
            'qs_nomi' => "Ru",
        ]);
    }
}
