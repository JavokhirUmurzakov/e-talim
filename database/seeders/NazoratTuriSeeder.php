<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NazoratTuriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nazorat_turis')->insert([
            'nazorat' => 'oraliq',

        ]);
        DB::table('nazorat_turis')->insert([
            'nazorat' => 'yakuniy',
        ]);
        DB::table('nazorat_turis')->insert([
            'nazorat' => 'joriy',
        ]);
    }
}
