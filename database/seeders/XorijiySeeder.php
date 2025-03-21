<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class XorijiySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('xorijiys')->insert([
            'davlat_nomi' => 'Tojikiston',
            'bayroq_icon'=>'icon1.png',
        ]);

        DB::table('xorijiys')->insert([
            'davlat_nomi' => 'Rassiya',
            'bayroq_icon'=>'icon2.png',
        ]);
    }
}
