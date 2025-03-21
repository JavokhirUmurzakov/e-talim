<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DarsVaqtiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dars_vaqtis')->insert([
            'nomi' => '1-para',
            'vaqti' => '2 soat',
            'boshlanishi'=>'11:32',
            'tugashi'=>'12:32'


        ]);
        DB::table('dars_vaqtis')->insert([
            'nomi' => '2-para',
            'vaqti' => '2 soat',
            'boshlanishi'=>'11:32',
            'tugashi'=>'12:32'
        ]);
    }
}
