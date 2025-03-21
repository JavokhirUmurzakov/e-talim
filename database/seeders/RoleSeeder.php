<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'nomi' => 'Mudofaa Vazirligi - Admin',
            'qs_nomi' => 'mv_admin',
        ]);
        DB::table('roles')->insert([
            'nomi' => "Mudofaa Vazirligi - O'quv Bo'limi",
            'qs_nomi' => 'mv_upvka',
        ]);

        DB::table('roles')->insert([
            'nomi' => "OHTM - Admin",
            'qs_nomi' => 'ohtm_admin',
        ]);
        DB::table('roles')->insert([
            'nomi' => "OHTM - Boshliq",
            'qs_nomi' => 'ohtm_boshliq',
        ]);
        DB::table('roles')->insert([
            'nomi' => "OHTM - O'quv Bo'limi",
            'qs_nomi' => 'ohtm_uquv_bulimi',
        ]);
        DB::table('roles')->insert([
            'nomi' => "OHTM - Fakultet (Kafedra) boshlig'i",
            'qs_nomi' => 'ohtm_fak_kaf_boshliq',
        ]);
        DB::table('roles')->insert([
            'nomi' => "OHTM - O'qituvchi",
            'qs_nomi' => 'ohtm_uqituvchi',
        ]);
        DB::table('roles')->insert([
            'nomi' => "OHTM - Tinglovchi",
            'qs_nomi' => 'ohtm_tinglovchi',
        ]);

    }
}
