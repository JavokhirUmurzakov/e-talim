<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class QabulStatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('qabul_statistikas')->insert([
            'qabul_yili' => '12.12.2025',
            'abituriyentlar_soni' =>250,
            'qabul_soni' => 200,
            'ohtm_id' => 1,

        ]);

        DB::table('qabul_statistikas')->insert([
            'qabul_yili' => '12.12.2025',
            'abituriyentlar_soni' =>250,
            'qabul_soni' => 200,
            'ohtm_id' => 1,

        ]);
    }
}
