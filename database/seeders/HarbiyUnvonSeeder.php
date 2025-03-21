<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HarbiyUnvonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("harbiy_unvons")->insert([
            'nomi'=>'kapitan',
            'qs_nomi'=>'k-t'
        ]);

        DB::table("harbiy_unvons")->insert([
            'nomi'=>'mayor',
            'qs_nomi'=>'m-r'
        ]);
    }
}
