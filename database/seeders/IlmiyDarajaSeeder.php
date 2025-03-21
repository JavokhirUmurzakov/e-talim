<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IlmiyDarajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ilmiy_darajas')->insert([
            'nomi'=>'mavjud emas',
            'qs_nomi'=>"yo'q"
        ]);

        DB::table('ilmiy_darajas')->insert([
            'nomi'=>'dotsent',
            'qs_nomi'=>'dot'
        ]);

        DB::table('ilmiy_darajas')->insert([
            'nomi'=>'professor',
            'qs_nomi'=>'prof'
        ]);
    }
}
