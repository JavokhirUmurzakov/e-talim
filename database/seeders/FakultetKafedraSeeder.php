<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FakultetKafedraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fakultet_kafedras')->insert([
            'nomi'=>'IT',
            'qs_nomi'=>'IT',
            'haqida'=>'ITkafedra_N1',
            'kod'=>'2',
            'parent_id'=>'1',
            'fak_kaf_turi_id'=>'4',
            'ohtm_id'=>'1',

        ]);
        DB::table('fakultet_kafedras')->insert([
            'nomi'=>'Tank',
            'qs_nomi'=>'Tank',
            'haqida'=>'ITkafedra_N1',
            'kod'=>'4',
            'parent_id'=>'1',
            'fak_kaf_turi_id'=>'4',
            'ohtm_id'=>'2',

        ]);
        DB::table('fakultet_kafedras')->insert([
            'nomi'=>'KX',
            'qs_nomi'=>'KX',
            'haqida'=>'ITkafedra_N1',
            'kod'=>'1',
            'parent_id'=>'1',
            'fak_kaf_turi_id'=>'3',
            'ohtm_id'=>'1',

        ]);

    }
}
