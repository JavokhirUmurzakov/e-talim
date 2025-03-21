<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class XonalarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('xonalars')->insert([
            'nomi'=>'Uquv binosi',
            'haqida'=>'IT_Xona_N1',
            'parent_id'=>'1',
            'fakultet_kafedra_id'=>'1',
        ]);
        DB::table('xonalars')->insert([
            'nomi'=>'Yotoq binosi',
            'haqida'=>'N1',
            'parent_id'=>'2',
            'fakultet_kafedra_id'=>'2',
        ]);
        DB::table('xonalars')->insert([
            'nomi'=>'125',
            'haqida'=>'IT_Xona_N1',
            'parent_id'=>'1',
            'fakultet_kafedra_id'=>'1',
        ]);

    }
}
