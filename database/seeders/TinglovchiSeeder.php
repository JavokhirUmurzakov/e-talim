<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TinglovchiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tinglovchis')->insert([
            'fio'=>'Rustamov A.V',
            'lavozim'=>'uqchi',
            'rasm'=>'dsdasda.pdf',
            'haqida'=>'Andijon',
            'guruh_id'=>'1',
            'tinglovchi_holat_id'=>'2',
            'tinglovchi_diplom_id'=>'2',
            'harbiy_unvon_id'=>2,
            'user_id'=>'4',
            'fakultet_kafedra_id'=>1,
            'ohtm_id'=>1,
        ]);
        DB::table('tinglovchis')->insert([
            'fio'=>'Rustambekov D.R.',
            'lavozim'=>'uqchi',
            'rasm'=>'dsdasda.pdf',
            'haqida'=>'Toshkent',
            'guruh_id'=>'2',
            'tinglovchi_holat_id'=>'2',
            'tinglovchi_diplom_id'=>'3',
            'harbiy_unvon_id'=>1,
            'user_id'=>'2',
            'fakultet_kafedra_id'=>2,
            'ohtm_id'=>2,
        ]);
        DB::table('tinglovchis')->insert([
            'fio'=>'Usmonov A. H.',
            'lavozim'=>'uqchi',
            'rasm'=>'adsdassada.pdf',
            'haqida'=>'Qashqadaryo',
            'guruh_id'=>'1',
            'tinglovchi_holat_id'=>'2',
            'tinglovchi_diplom_id'=>'1',
            'harbiy_unvon_id'=>1,
            'user_id'=>'3',
            'fakultet_kafedra_id'=>1,
            'ohtm_id'=>2,
        ]);

    }
}
