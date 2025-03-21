<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinglovchiHolatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tinglovchi_holats')->insert([
            'nomi' => 'Darsda',
        ]);

        DB::table('tinglovchi_holats')->insert([
            'nomi' => 'Kasal',
        ]);
    }
}
