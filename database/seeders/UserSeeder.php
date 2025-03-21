<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'nomi' => 'test1',
            'login' => 'mv_admin',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'nomi' => 'test2',
            'login' => 'mv_upvka',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'nomi' => 'test3',
            'login' => 'ohtm_admin',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'nomi' => 'test4',
            'login' => 'ohtm_boshliq',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'nomi' => 'test5',
            'login' => 'ohtm_uquv_bulimi',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'nomi' => 'test6',
            'login' => 'ohtm_fak_kaf_boshliq',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'nomi' => 'test7',
            'login' => 'ohtm_uqituvchi',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'nomi' => 'test8',
            'login' => 'ohtm_tinglovchi',
            'password' => Hash::make('12345678'),
        ]);

    }
}
