<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FanUqituvchiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("fan_uqituvchis")->insert([
            'uqituvchi_id'=>1,
            'jurnal_id'=>1,
            'dars_turi_id'=>1,
            'soat'=>90,
        ]);

        DB::table("fan_uqituvchis")->insert([
            'uqituvchi_id'=>2,
            'jurnal_id'=>2,
            'dars_turi_id'=>2,
            'soat'=>90,

        ]);
    }
}
