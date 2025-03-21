<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GuruhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guruhs')->insert([
            'nomi'=>'1-guruh',
            'boshliq_fio'=>'Yusupov B.K',
            'holat'=>true,
            'fakultet_kafedra_id'=>'1',
            'til_id'=>'1',
            'kurs_bosqiches_id'=>'1',
            'yunalish_id'=>'2',
        ]);
        DB::table('guruhs')->insert([
            'nomi'=>'2-guruh',
            'boshliq_fio'=>'Komilov A.',
            'holat'=>true,
            'fakultet_kafedra_id'=>'2',
            'til_id'=>'1',
            'kurs_bosqiches_id'=>'2',
            'yunalish_id'=>'2',
        ]);
        DB::table('guruhs')->insert([
            'nomi'=>'3-guruh',
            'boshliq_fio'=>'Shukurov O.',
            'holat'=>false,
            'fakultet_kafedra_id'=>'1',
            'til_id'=>'2',
            'kurs_bosqiches_id'=>'3',
            'yunalish_id'=>'1',
        ]);

    }
}
