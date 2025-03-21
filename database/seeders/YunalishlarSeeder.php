<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class YunalishlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('yunalishlars')->insert([
            'nomi'=>'IT',
            'qs_nomi'=>'IT',
            'shifr'=>'1231242',
            'haqida'=>'ITkafedra_N1',
            'fanlar'=>'IT,Web',
            'logo'=>'fdsfsffsds.jpg',
            'faol'=>'true',
            'ohtm_id'=>'1',
        ]);
        DB::table('yunalishlars')->insert([
            'nomi'=>'KX',
            'qs_nomi'=>'KX',
            'shifr'=>'12312982',
            'haqida'=>'ITkafedra_N1',
            'fanlar'=>'KX,Web',
            'logo'=>'fdsfsdsdffsds.jpg',
            'faol'=>'true',
            'ohtm_id'=>'1',
        ]);
        DB::table('yunalishlars')->insert([
            'nomi'=>'Tank',
            'qs_nomi'=>'Tank',
            'shifr'=>'56431242',
            'haqida'=>'ITkafedra_N1',
            'fanlar'=>'IT,Tank',
            'logo'=>'fdsfssdfsasds.jpg',
            'faol'=>'true',
            'ohtm_id'=>'2',
        ]);


    }
}
