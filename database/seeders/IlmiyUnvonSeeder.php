<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IlmiyUnvonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ilmiy_unvons')->insert([
            'nomi'=>'mavjud emas',
            'qs_nomi'=>"yo'q"
        ]);

        DB::table('ilmiy_unvons')->insert([
            'nomi'=>"PHD",
            'qs_nomi'=>"phd"
        ]);

        DB::table('ilmiy_unvons')->insert([
            'nomi'=>"DS",
            'qs_nomi'=>"ds"
        ]);
    }
}
