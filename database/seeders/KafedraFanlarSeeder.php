<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KafedraFanlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kafedra_fanlars')->insert([
            'fanlar_id' => '1',
            'guruh_id' => '1',
            'uquv_yili_ohtm_id' => '1',
            'soat'=>'60',
            'oraliq'=>true,
            'yakuniy'=>true,
            ]);


        DB::table('kafedra_fanlars')->insert([
            'fanlar_id' => '2',
            'guruh_id' => '2',
            'uquv_yili_ohtm_id' => '2',
            'soat'=>'60',
            'oraliq'=>true,
            'yakuniy'=>true,
        ]);
    }
}
