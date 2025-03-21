<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bahos')->insert([
            "nomi"=>"1"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"2"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"3"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"4"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"5"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"n"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"s"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"k"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"t"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"oz"
        ]);
        DB::table('bahos')->insert([
            "nomi"=>"y"
        ]);

    }
}
