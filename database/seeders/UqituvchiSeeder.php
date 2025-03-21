<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UqituvchiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uqituvchis')->insert([
            'fio'=>'Komilov Alisher',
            'lavozim'=>'PHD',
            'rasm'=>'images/wLVcRRwc6W0yDETmoHRU6mrEuYBR8yI6TODTOHzo.jpg',
            'mutaxassisligi'=>'Web dasturchi',
            'rahbar'=>false,
            'uqituvchi_holat_id'=>1,
            'harbiy_unvon_id'=>2,
            'fakultet_kafedra_id'=>1,
            'ilmiy_unvon_id'=>1,
            'ilmiy_daraja_id'=>1,
            'user_id'=>1,
            'ohtm_id'=>1,

        ]);

        DB::table('uqituvchis')->insert([
            'fio'=>'Yusupov Bahodir',
            'lavozim'=>'PHD',
            'rasm'=>'images/images/wLVcRRwc6W0yDETmoHRU6mrEuYBR8yI6TODTOHzo.jpg',
            'mutaxassisligi'=>'Tarmoq mutaxasisi',
            'rahbar'=>true,
            'uqituvchi_holat_id'=>2,
            'harbiy_unvon_id'=>1,
            'fakultet_kafedra_id'=>1,
            'ilmiy_unvon_id'=>1,
            'ilmiy_daraja_id'=>1,
            'user_id'=>2,
            'ohtm_id'=>1,

        ]);

    }
}
