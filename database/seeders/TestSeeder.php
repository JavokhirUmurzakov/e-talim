<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('fakultet_kafedras')->insert([
            'nomi' => 'test1',
            'qs_nomi' => 'nm',
            'haqida' => 'text',
            'kod' => '123',
            'fak_kaf_turi_id' => 1,
            'ohtm_id' => 1,
        ]);
    }
}
