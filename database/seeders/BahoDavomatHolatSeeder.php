<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class   BahoDavomatHolatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('baho_davomat_holats')->insert([
            "nomi"=>"Naryad"
        ]);
        DB::table('baho_davomat_holats')->insert([
            "nomi"=>"Kasal"
        ]);
    }
}
