<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class XabarlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('xabarlars')->insert([
            'nomi' => 'Xabar 1',
            'haqida' => 'AKT va AHI kursantlar baholari',
            'sana' => "07.02.2025",
            'xabar_muallifi' => 'Shakarboyev Shaxobiddin',
            'pdf' => 'baho.pdf',
            'ohtm_id'=>1,
        ]);

        DB::table('xabarlars')->insert([
            'nomi' => 'Xabar 2',
            'haqida' => 'Chirchiq kursantlar baholari',
            'sana' => "07.03.2025",
            'xabar_muallifi' => 'Rustambekov Dostonbek',
            'pdf' => 'daklad.pdf',
            'ohtm_id'=>2,
        ]);
    }
}
