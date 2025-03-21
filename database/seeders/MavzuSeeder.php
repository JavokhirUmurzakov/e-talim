<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MavzuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mavzus')->insert([
            'nomi'=>'Web sayt yaratish',
            'soat'=>'2 soat',
            'jurnal_id'=>"1",
            'dars_turis_id'=>'1',
            'file'=>'qewrew.jpg',
            'file_path'=>'c/sds/sdsweew'

        ]);
        DB::table('mavzus')->insert([
            'nomi'=>'Obyektlar bilan ishlash',
            'soat'=>'2 soat',
            'jurnal_id'=>"2",
            'dars_turis_id'=>'2',
            'file'=>'asaqewrew.jpg',
            'file_path'=>'d/sewefs/sdsweew'

        ]);
    }
}
