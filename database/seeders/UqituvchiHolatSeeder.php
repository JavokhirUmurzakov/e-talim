<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UqituvchiHolatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uqituvchi_holats')->insert([
            'nomi'=>'1 Stavka',
            'qs_nomi'=>'1'
        ]);
        DB::table('uqituvchi_holats')->insert([
            'nomi'=>'0.75 Stavka',
            'qs_nomi'=>'0.75'
        ]);
        DB::table('uqituvchi_holats')->insert([
            'nomi'=>'0.5 Stavka',
            'qs_nomi'=>'0.5'
        ]);
        DB::table('uqituvchi_holats')->insert([
            'nomi'=>'0.25 Stavka',
            'qs_nomi'=>'0.25'
        ]);
        DB::table('uqituvchi_holats')->insert([
            'nomi'=>'Soatbay',
            'qs_nomi'=>'S-b'
        ]);
    }
}
