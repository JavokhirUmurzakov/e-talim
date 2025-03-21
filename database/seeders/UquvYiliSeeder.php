<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UquvYiliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uquv_yilis')->insert([
            'nomi' => '2024-2025',
        ]);

        DB::table('uquv_yilis')->insert([
            'nomi' => '2023-2024',
        ]);
    }
}
