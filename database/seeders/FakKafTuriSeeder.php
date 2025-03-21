<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakKafTuriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fak_kaf_turis')->insert([
            'nomi' => 'Boshqarma',
            'boshqarma' => '1',
        ]);
        DB::table('fak_kaf_turis')->insert([
            'nomi' => 'Institut',
            'boshqarma' => '1',
        ]);
        DB::table('fak_kaf_turis')->insert([
            'nomi' => 'Fakultet',
            'boshqarma' => '1',
        ]);
        DB::table('fak_kaf_turis')->insert([
            'nomi' => 'Kafedra',
            'boshqarma' => '0',
        ]);
    }
}
