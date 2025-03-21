<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FanlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("fanlars")->insert([
            "nomi"=>"Web dasturlash",
            "qs_nomi"=>'Web',
            'kod'=>'WT',
            'faol'=>true,
            'fakultet_kafedra_id'=>1,
            'ohtm_id'=>1,
        ]);

        DB::table("fanlars")->insert([
            "nomi"=>"C++ dasturlash",
            "qs_nomi"=>'C++',
            'kod'=>'C',
            'faol'=>true,
            'fakultet_kafedra_id'=>2,
            'ohtm_id'=>2,
        ]);
    }
}
