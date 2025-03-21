<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\TinglovchiHolatController;
use App\Models\Akkreditatsiya;
use App\Models\Qabul_statistika;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OhtmSeeder;
use Database\Seeders\FakKafTuriSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            OhtmSeeder::class,
            FakKafTuriSeeder::class,
            TilSeeder::class,
            XabarlarSeeder::class,
            QabulStatistikSeeder::class,
            DarsVaqtiSeeder::class,
            DarsTuriSeeder::class,
            UquvYiliSeeder::class,
            TinglovchiHolatSeeder::class,
            KursHolatSeeder::class,
            FakultetKafedraSeeder::class,
            UquvTuriSeeder::class,
            HarbiyUnvonSeeder::class,
            IlmiyDarajaSeeder::class,
            IlmiyUnvonSeeder::class,
            BahoDavomatHolatSeeder::class,
            UqituvchiHolatSeeder::class,
            KursBosqichSeeder::class,
            FanlarSeeder::class,
            UqituvchiSeeder::class,
            XorijiySeeder::class,
            KursSeeder::class,
            YunalishlarSeeder::class,
            GuruhSeeder::class,
            UquvYiliOhtmSeeder::class,
            JurnalSeeder::class,
            FanUqituvchiSeeder::class,
            XonalarSeeder::class,
            TinglovchiDiplomSeeder::class,
            DarsJadvalSeeder::class,
            TinglovchiSeeder::class,
            YuklamaSeeder::class,
            HorijdagiTinglovchilarSeeder::class,
            KafedraFanlarSeeder::class,
            MavzuSeeder::class,
            NazoratTuriSeeder::class,
            DarsKunSeeder::class,
            //            TestSeeder::class
        ]);

        $users = Akkreditatsiya::factory()->count(100000)->create();
    }
}
