<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DarsTuriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dars_turis')->insert([
            'nomi' => 'Amaliy',

        ]);

        DB::table('dars_turis')->insert([
            'nomi' => 'Maruza',

        ]);
    }
}
