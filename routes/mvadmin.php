<?php

use App\Http\Controllers\FanUqituvchiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mv_admin\MvadminController;
use App\Http\Controllers\AkkreditatsiyaController;
use App\Http\Controllers\OhtmController;
use App\Http\Controllers\FakKafTuriController;
use App\Http\Controllers\DarsVaqtiController;
use App\Http\Controllers\DarsTuriController;
use App\Http\Controllers\TinglovchiHolatController;
use App\Http\Controllers\UquvYiliController;
use App\Http\Controllers\UquvTuriController;
use App\Http\Controllers\KursHolatController;
use App\Http\Controllers\KursBosqichController;
use App\Http\Controllers\BahoDavomatHolatController;
use App\Http\Controllers\IlmiyUnvonController;
use App\Http\Controllers\IlmiyDarajaController;
use App\Http\Controllers\HarbiyUnvonController;
use App\Http\Controllers\UqituvchiHolatController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TilController;
use App\Http\Controllers\NashrTuriController;
use App\Http\Controllers\YutuqYunalishController;
use App\Http\Controllers\TinglovchiDiplomController;
use App\Http\Controllers\XabarlarController;
use App\Http\Controllers\QabulStatistikaController;
use App\Http\Controllers\FakultetKafedraController;
use App\Http\Controllers\YunalishlarController;
use App\Http\Controllers\UquvYiliOhtmController;
use App\Http\Controllers\FanlarController;
use App\Http\Controllers\FoydalanuvchiController;
use App\Http\Controllers\GuruhController;

Route::group(['prefix' => '/mv_admin', 'as' => 'mv_admin.'], function () {
    Route::get('/', [MvadminController::class, 'index'])->name('mv_admin_home');

//    akkredatsiya
    Route::get('/akkreditatsiya', [AkkreditatsiyaController::class, 'index'])->name('akkreditatsiya.index');
    Route::post('/akkreditatsiya', [AkkreditatsiyaController::class, 'create'])->name('akkreditatsiya.create');
    Route::delete('/akkreditatsiya/{id}', [AkkreditatsiyaController::class, 'delete'])->name('akkreditatsiya.delete');
    Route::put('/akkreditatsiya/{id}/edit', [AkkreditatsiyaController::class, 'edit'])->name('akkreditatsiya.edit');

//    ohtm
    Route::get('/ohtm', [OhtmController::class, 'index'])->name('ohtm.index');
    Route::post('/ohtm', [OhtmController::class, 'create'])->name('ohtm.create');
    Route::delete('/ohtm/{id}', [OhtmController::class, 'delete'])->name('ohtm.delete');
    Route::put('/ohtm/{id}/edit', [OhtmController::class, 'edit'])->name('ohtm.edit');

//    fak_kaf_turi
    Route::get('/fak_kaf_turi', [FakKafTuriController::class, 'index'])->name('fak_kaf_turi.index');
    Route::post('/efak_kaf_turi', [FakKafTuriController::class, 'create'])->name('fak_kaf_turi.create');
    Route::delete('/fak_kaf_turi/{id}', [FakKafTuriController::class, 'delete'])->name('fak_kaf_turi.delete');
    Route::put('/fak_kaf_turi/{id}/edit', [FakKafTuriController::class, 'edit'])->name('fak_kaf_turi.edit');

//   . dars_vaqti
    Route::get('/dars_vaqti', [DarsVaqtiController::class, 'index'])->name('dars_vaqti.index');
    Route::post('/dars_vaqti', [DarsVaqtiController::class, 'create'])->name('dars_vaqti.create');
    Route::delete('/dars_vaqti/{id}', [DarsVaqtiController::class, 'delete'])->name('dars_vaqti.delete');
    Route::put('/dars_vaqti/{id}/edit', [DarsVaqtiController::class, 'edit'])->name('dars_vaqti.edit');

//    dars_turi
    Route::get('/dars_turi', [DarsTuriController::class, 'index'])->name('dars_turi.index');
    Route::post('/dars_turi', [DarsTuriController::class, 'create'])->name('dars_turi.create');
    Route::delete('/dars_turi/{id}', [DarsTuriController::class, 'delete'])->name('dars_turi.delete');
    Route::put('/dars_turi/{id}/edit', [DarsTuriController::class, 'edit'])->name('dars_turi.edit');

//    tinglovc.hi_holat
    Route::get('/tinglovchi_holat', [TinglovchiHolatController::class, 'index'])->name('tinglovchi_holat.index');
    Route::post('/tinglovchi_holat', [TinglovchiHolatController::class, 'create'])->name('tinglovchi_holat.create');
    Route::delete('/tinglovchi_holat/{id}', [TinglovchiHolatController::class, 'delete'])->name('tinglovchi_holat.delete');
    Route::put('/tinglovchi_holat/{id}/edit', [TinglovchiHolatController::class, 'edit'])->name('tinglovchi_holat.edit');

//    uquv_yili
    Route::get('/uquv_yili', [UquvYiliController::class, 'index'])->name('uquv_yili.index');
    Route::post('/uquv_yili', [UquvYiliController::class, 'create'])->name('uquv_yili.create');
    Route::delete('/uquv_yili/{id}', [UquvYiliController::class, 'delete'])->name('uquv_yili.delete');
    Route::put('/uquv_yili/{id}/edit', [UquvYiliController::class, 'edit'])->name('uquv_yili.edit');

//    uquv_turi
    Route::get('/uquv_turi', [UquvTuriController::class, 'index'])->name('uquv_turi.index');
    Route::post('/uquv_turi', [UquvTuriController::class, 'create'])->name('uquv_turi.create');
    Route::delete('/uquv_turi/{id}', [UquvTuriController::class, 'delete'])->name('uquv_turi.delete');
    Route::put('/uquv_turi/{id}/edit', [UquvTuriController::class, 'edit'])->name('uquv_turi.edit');

//    kurs_holat
    Route::get('/kurs_holat', [KursHolatController::class, 'index'])->name('kurs_holat.index');
    Route::post('/kurs_holat', [KursHolatController::class, 'create'])->name('kurs_holat.create');
    Route::delete('/kurs_holat/{id}', [KursHolatController::class, 'delete'])->name('kurs_holat.delete');
    Route::put('/kurs_holat/{id}/edit', [KursHolatController::class, 'edit'])->name('kurs_holat.edit');

//    kurs_bosqich
    Route::get('/kurs_bosqich', [KursBosqichController::class, 'index'])->name('kurs_bosqich.index');
    Route::post('/kurs_bosqich', [KursBosqichController::class, 'create'])->name('kurs_bosqich.create');
    Route::delete('/kurs_bosqich/{id}', [KursBosqichController::class, 'delete'])->name('kurs_bosqich.delete');
    Route::put('/kurs_bosqich/{id}/edit', [KursBosqichController::class, 'edit'])->name('kurs_bosqich.edit');

//    baho_davomat_holat
    Route::get('/baho_davomat_holat', [BahoDavomatHolatController::class, 'index'])->name('baho_davomat_holat.index');
    Route::post('/baho_davomat_holat', [BahoDavomatHolatController::class, 'create'])->name('baho_davomat_holat.create');
    Route::delete('/baho_davomat_holat/{id}', [BahoDavomatHolatController::class, 'delete'])->name('baho_davomat_holat.delete');
    Route::put('/baho_davomat_holat/{id}/edit', [BahoDavomatHolatController::class, 'edit'])->name('baho_davomat_holat.edit');

//    ilmiy_unvon
    Route::get('/ilmiy_unvon', [IlmiyUnvonController::class, 'index'])->name('ilmiy_unvon.index');
    Route::post('/ilmiy_unvon', [IlmiyUnvonController::class, 'create'])->name('ilmiy_unvon.create');
    Route::delete('/ilmiy_unvon/{id}', [IlmiyUnvonController::class, 'delete'])->name('ilmiy_unvon.delete');
    Route::put('/ilmiy_unvon/{id}/edit', [IlmiyUnvonController::class, 'edit'])->name('ilmiy_unvon.edit');

//    ilmiy_daraja
    Route::get('/ilmiy_daraja', [IlmiyDarajaController::class, 'index'])->name('ilmiy_daraja.index');
    Route::post('/ilmiy_daraja', [IlmiyDarajaController::class, 'create'])->name('ilmiy_daraja.create');
    Route::delete('/ilmiy_daraja/{id}', [IlmiyDarajaController::class, 'delete'])->name('ilmiy_daraja.delete');
    Route::put('/ilmiy_daraja/{id}/edit', [IlmiyDarajaController::class, 'edit'])->name('ilmiy_daraja.edit');

//    harbiy_unvon
    Route::get('/harbiy_unvon', [HarbiyUnvonController::class, 'index'])->name('harbiy_unvon.index');
    Route::post('/harbiy_unvon', [HarbiyUnvonController::class, 'create'])->name('harbiy_unvon.create');
    Route::delete('/harbiy_unvon/{id}', [HarbiyUnvonController::class, 'delete'])->name('harbiy_unvon.delete');
    Route::put('/harbiy_unvon/{id}/edit', [HarbiyUnvonController::class, 'edit'])->name('harbiy_unvon.edit');

//    uqituvchi_holat
    Route::get('/uqituvchi_holat', [UqituvchiHolatController::class, 'index'])->name('uqituvchi_holat.index');
    Route::post('/uqituvchi_holat', [UqituvchiHolatController::class, 'create'])->name('uqituvchi_holat.create');
    Route::delete('/uqituvchi_holat/{id}', [UqituvchiHolatController::class, 'delete'])->name('uqituvchi_holat.delete');
    Route::put('/uqituvchi_holat/{id}/edit', [UqituvchiHolatController::class, 'edit'])->name('uqituvchi_holat.edit');

//    role
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/role', [RoleController::class, 'create'])->name('role.create');
    Route::delete('/role/{id}', [RoleController::class, 'delete'])->name('role.delete');
    Route::put('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');

//    til
    Route::get('/til', [TilController::class, 'index'])->name('til.index');
    Route::post('/til', [TilController::class, 'create'])->name('til.create');
    Route::delete('/til/{id}', [TilController::class, 'delete'])->name('til.delete');
    Route::put('/til/{id}/edit', [TilController::class, 'edit'])->name('til.edit');

//    nashr_turi
    Route::get('/nashr_turi', [NashrTuriController::class, 'index'])->name('nashr_turi.index');
    Route::post('/nashr_turi', [NashrTuriController::class, 'create'])->name('nashr_turi.create');
    Route::delete('/nashr_turi/{id}', [NashrTuriController::class, 'delete'])->name('nashr_turi.delete');
    Route::put('/nashr_turi/{id}/edit', [NashrTuriController::class, 'edit'])->name('nashr_turi.edit');

//    yutuq_yunalish
    Route::get('/yutuq_yunalish', [YutuqYunalishController::class, 'index'])->name('yutuq_yunalish.index');
    Route::post('/yutuq_yunalish', [YutuqYunalishController::class, 'create'])->name('yutuq_yunalish.create');
    Route::delete('/yutuq_yunalish/{id}', [YutuqYunalishController::class, 'delete'])->name('yutuq_yunalish.delete');
    Route::put('/yutuq_yunalish/{id}/edit', [YutuqYunalishController::class, 'edit'])->name('yutuq_yunalish.edit');

//    tinglovchi_diplom
    Route::get('/tinglovchi_diplom', [TinglovchiDiplomController::class, 'index'])->name('tinglovchi_diplom.index');
    Route::post('/tinglovchi_diplom', [TinglovchiDiplomController::class, 'create'])->name('tinglovchi_diplom.create');
    Route::delete('/tinglovchi_diplom/{$id}', [TinglovchiDiplomController::class, 'delete'])->name('tinglovchi_diplom.delete');
    Route::put('/tinglovchi_diplom/{id}/edit', [TinglovchiDiplomController::class, 'edit'])->name('tinglovchi_diplom.edit');

//    xabarlar
    Route::get('/xabarlar', [XabarlarController::class, 'index'])->name('xabarlar.index');
    Route::post('/xabarlar', [XabarlarController::class, 'create'])->name('xabarlar.create');
    Route::post('/xabarlar/delete', [XabarlarController::class, 'delete'])->name('xabarlar.delete');
    Route::post('/xabarlar/{id}/edit', [XabarlarController::class, 'edit'])->name('xabarlar.edit');

//    qabul_statistika
    Route::get('/qabul_statistika', [QabulStatistikaController::class, 'index'])->name('qabul_statistika.index');
    Route::post('/qabul_statistika', [QabulStatistikaController::class, 'create'])->name('qabul_statistika.create');
    Route::post('/qabul_statistika/delete', [QabulStatistikaController::class, 'delete'])->name('qabul_statistika.delete');
    Route::post('/qabul_statistika/{id}/edit', [QabulStatistikaController::class, 'edit'])->name('qabul_statistika.edit');

//    fakultet_kafedra
    Route::get('/fakultet_kafedra', [FakultetKafedraController::class, 'index'])->name('fakultet_kafedra.index');
    Route::post('/fakultet_kafedra', [FakultetKafedraController::class, 'create'])->name('fakultet_kafedra.create');
    Route::post('/fakultet_kafedra/delete', [FakultetKafedraController::class, 'delete'])->name('fakultet_kafedra.delete');
    Route::post('/fakultet_kafedra/{id}/edit', [FakultetKafedraController::class, 'edit'])->name('fakultet_kafedra.edit');

//    yunalishlar
    Route::get('/yunalishlar', [YunalishlarController::class, 'index'])->name('yunalishlar.index');
    Route::post('/yunalishlar', [YunalishlarController::class, 'create'])->name('yunalishlar.create');
    Route::post('/yunalishlar/delete', [YunalishlarController::class, 'delete'])->name('yunalishlar.delete');
    Route::post('/yunalishlar/{id}/edit', [YunalishlarController::class, 'edit'])->name('yunalishlar.edit');

//    uquv_yili_ohtm
    Route::get('/uquv_yili_ohtm', [UquvYiliOhtmController::class, 'index'])->name('uquv_yili_ohtm.index');
    Route::post('/uquv_yili_ohtm', [UquvYiliOhtmController::class, 'create'])->name('uquv_yili_ohtm.create');
    Route::post('/uquv_yili_ohtm/delete', [UquvYiliOhtmController::class, 'delete'])->name('uquv_yili_ohtm.delete');
    Route::post('/uquv_yili_ohtm/{id}/edit', [UquvYiliOhtmController::class, 'edit'])->name('uquv_yili_ohtm.edit');


    Route::get('/fanlar', [FanlarController::class, 'index'])->name('fanlar.index');
    Route::post('/fanlar/create', [FanlarController::class, 'create'])->name('fanlar.create');
    Route::delete('/fanlar/{id}', [FanlarController::class, 'delete'])->name('fanlar.delete');
    Route::put('/fanlar/{id}/edit', [FanlarController::class, 'edit'])->name('fanlar.edit');

    Route::get('/foydalanuvchilar', [FoydalanuvchiController::class, 'index'])->name('foydalanuvchi.index');
    Route::post('/foydalanuvchi/create', [FoydalanuvchiController::class, 'create'])->name('foydalanuvchi.create');
    Route::delete('/foydalanuvchi/{id}', [FoydalanuvchiController::class, 'delete'])->name('foydalanuvchi.delete');
    Route::put('/foydalanuvchi/{id}/edit', [FoydalanuvchiController::class, 'edit'])->name('foydalanuvchi.edit');
    // Fan-Uqituvchi
    Route::get('/fan_uqituvchi', [FanUqituvchiController::class, 'index'])->name('fan_uqituvchi.index');
    Route::get('/fan_uqituvchi/create', [FanUqituvchiController::class, 'create'])->name('fan_uqituvchi.create');
    Route::post('/fan_uqituvchi', [FanUqituvchiController::class, 'store'])->name('fan_uqituvchi.store');
    Route::get('/fan_uqituvchi/{id}/edit', [FanUqituvchiController::class, 'edit'])->name('fan_uqituvchi.edit');
    Route::put('/fan_uqituvchi/{id}', [FanUqituvchiController::class, 'update'])->name('fan_uqituvchi.update');
    Route::delete('/fan_uqituvchi/{id}', [FanUqituvchiController::class, 'destroy'])->name('fan_uqituvchi.destroy');

//   Guruhlar
//    Route::get('/guruh', [GuruhController::class, 'index'])->name('guruh.index');
//    Route::post('/guruh', [GuruhController::class, 'create'])->name('guruh.create');
//    Route::delete('/guruh/delete', [GuruhController::class, 'delete'])->name('guruh.delete');
//    Route::put('/guruh/{id}/edit', [GuruhController::class, 'edit'])->name('guruh.edit');


});


