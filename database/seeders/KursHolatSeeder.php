<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KursHolatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kurs_holats')->insert([
            'nomi' => 'online',
        ]);
        DB::table('kurs_holats')->insert([
            'nomi' => 'ofline',
        ]);
    }
}
