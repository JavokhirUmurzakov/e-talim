<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class OhtmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ohtms')->insert([
            'nomi' => 'AKT va AHI',
            'qs_nomi' => 'AKT va AHI',
            'uqituvchi_id' => null,
            'haqida' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
            'logo' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
        ]);
        DB::table('ohtms')->insert([
            'nomi' => 'CHVTKU',
            'qs_nomi' => 'CHVTKU',
            'uqituvchi_id' => null,
            'haqida' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
            'logo' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
        ]);
        DB::table('ohtms')->insert([
            'nomi' => 'Akademiya',
            'qs_nomi' => 'DVAU',
            'uqituvchi_id' => null,
            'haqida' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
            'logo' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
        ]);
        DB::table('ohtms')->insert([
            'nomi' => 'DVAU',
            'qs_nomi' => 'DVAU',
            'uqituvchi_id' => null,
            'haqida' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
            'logo' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
        ]);
        DB::table('ohtms')->insert([
            'nomi' => 'Tibbiyot akkademiyasi',
            'qs_nomi' => 'Tibbiyot akkademiyasi',
            'uqituvchi_id' => null,
            'haqida' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
            'logo' => 'Once you have defined your factories, you may use the static factory method provided to your models by the',
        ]);
    }
}
