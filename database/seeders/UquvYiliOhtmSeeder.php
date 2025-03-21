<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UquvYiliOhtmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uquv_yili_ohtms')->insert([
            'nomi'=>'2024-2025(Kuzgi semestr)',
            'boshlanishi'=>'20.09.2024',
            'tugashi'=>'04.05.2025',
            'faol'=>'true',
            'ohtm_id'=>'1',
            'uquv_yili_id'=>'2',
        ]);
        DB::table('uquv_yili_ohtms')->insert([
            'nomi'=>'2024-2025(Bahorgi semestr)',
            'boshlanishi'=>'20.09.2024',
            'tugashi'=>'04.05.2025',
            'faol'=>'true',
            'ohtm_id'=>'1',
            'uquv_yili_id'=>'2',
        ]);
        DB::table('uquv_yili_ohtms')->insert([
            'nomi'=>'2023-2024(Bahorgi semestr)',
            'boshlanishi'=>'20.09.2023',
            'tugashi'=>'04.05.2024',
            'faol'=>'true',
            'ohtm_id'=>'2',
            'uquv_yili_id'=>'1',
        ]);

    }
}
