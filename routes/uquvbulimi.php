<?php

use App\Http\Controllers\ohtm_uqituvchi\MavzuController;


use App\Http\Controllers\ohtm_uquv_bulimi\AkkreditatsiyaController;
use App\Http\Controllers\ohtm_uquv_bulimi\JadvalExelController;
use App\Http\Controllers\ohtm_uquv_bulimi\KunlikNazoratController;
use App\Http\Controllers\ohtm_uquv_bulimi\QaytaTopshirishController;
use App\Http\Controllers\ohtm_uquv_bulimi\VidemostBahoController;
use App\Http\Controllers\ohtm_uquv_bulimi\FakKafedraController;
use App\Http\Controllers\ohtm_uquv_bulimi\JurnalController;
use App\Http\Controllers\ohtm_uquv_bulimi\KafedraFanlarController;
use App\Http\Controllers\ohtm_uquv_bulimi\KafFanlarController;
use App\Http\Controllers\ohtm_uquv_bulimi\KafGuruhlarController;
use App\Http\Controllers\ohtm_uquv_bulimi\KafTinglovchiController;
use App\Http\Controllers\ohtm_uquv_bulimi\KafUqituvchiController;
use App\Http\Controllers\ohtm_uquv_bulimi\TinglovchiController;
use App\Http\Controllers\ohtm_uquv_bulimi\GuruhController;
use App\Http\Controllers\ohtm_uquv_bulimi\DarsjadvaliController;
use App\Http\Controllers\ohtm_uquv_bulimi\DarsvaqtiController;
use App\Http\Controllers\ohtm_uquv_bulimi\FakultetBoshController;
use App\Http\Controllers\ohtm_uquv_bulimi\VidemostController;
use App\Http\Controllers\ohtm_uquv_bulimi\XonalarController;
use App\Http\Controllers\ohtm_uquv_bulimi\YunalishlarController;
use App\Http\Controllers\ohtm_uquv_bulimi\FanlarController;
use App\Http\Controllers\ohtm_uquv_bulimi\HujjatlarController;
use App\Http\Controllers\ohtm_uquv_bulimi\KafedraBoshController;
use App\Http\Controllers\ohtm_uquv_bulimi\UquvYiliOhtmController;
use App\Http\Controllers\ohtm_uquv_bulimi\KurslarController;
use App\Http\Controllers\ohtm_uquv_bulimi\HomeUquvBulimiController;
use App\Http\Controllers\ohtm_uquv_bulimi\KafBoshController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ohtm_uquv_bulimi\UqituvchiController;
use App\Http\Controllers\ohtm_uquv_bulimi\YunalishBoshController;



Route::group(['prefix'=>'uquvbulumi', 'as'=>'uquvbulumi.', 'middleware'=>'faol'], function(){
    //home
    Route::get('/uquv_bulimi_home', [HomeUquvBulimiController::class, 'index'])->name('uquv_bulimi_home.index');

    // Kafedra boshlig`i UI
    Route::get('/uquv_kafbosh/{id}', [KafBoshController::class, 'index'])->name('uquv_kafbosh.index');

    Route::get('/kaf_guruhlar/{id}', [KafGuruhlarController::class, 'index'])->name('kaf_guruhlar.index');

    Route::get('/kaf_uqituvchi/{id}', [KafUqituvchiController::class, 'index'])->name('kaf_uqituvchi.index');

    Route::get('/kaf_tinglovchi/{id}', [KafTinglovchiController::class, 'index'])->name('kaf_tinglovchi.index');

    Route::get('/kaf_fanlar/{id}', [KafFanlarController::class, 'index'])->name('kaf_fanlar.index');


    //home
    Route::get('/uquv_bulimi_home', [HomeUquvBulimiController::class, 'index'])->name('uquv_bulimi_home.index');

    Route::get('/akkreditatsiya_ohtm', [AkkreditatsiyaController::class, 'index'])->name('akkreditatsiya_ohtm.index');
    Route::post('/akkreditatsiya_ohtm', [AkkreditatsiyaController::class, 'create'])->name('akkreditatsiya_ohtm.create');
    Route::delete('/akkreditatsiya_ohtm/{id?}', [AkkreditatsiyaController::class, 'delete'])->name('akkreditatsiya_ohtm.delete');
    Route::put('/akkreditatsiya_ohtm/{id?}/edit', [AkkreditatsiyaController::class, 'edit'])->name('akkreditatsiya_ohtm.edit');

    //uqituvchi uchun route
    Route::get('/uqituvchi', [UqituvchiController::class, 'index'])->name('uqituvchi.index');
    Route::post('/uqituvchi', [UqituvchiController::class, 'store'])->name('uqituvchi.store');
    Route::delete('uqituvchi/{id}', [UqituvchiController::class, 'delete'])->name('uqituvchi.delete');
    Route::put('/uqituvchi/{id}/edit', [UqituvchiController::class, 'edit'])->name('uqituvchi.edit');

    //tinglovchi uchun route
    Route::get('/tinglovchi', [TinglovchiController::class, 'index'])->name('tinglovchi.index');
    Route::post('/tinglovchi', [TinglovchiController::class, 'store'])->name('tinglovchi.store');
    Route::delete('tinglovchi/{id}', [TinglovchiController::class, 'delete'])->name('tinglovchi.delete');
    Route::put('/tinglovchi/{id}/edit', [TinglovchiController::class, 'edit'])->name('tinglovchi.edit');
    // fanlar
    Route::get('/fanlar', [FanlarController::class, 'index'])->name('fanlar.index');
    Route::post('/fanlar/create', [FanlarController::class, 'create'])->name('fanlar.create');
    Route::delete('/fanlar/{id}', [FanlarController::class, 'delete'])->name('fanlar.delete');
    Route::put('/fanlar/{id}/edit', [FanlarController::class, 'edit'])->name('fanlar.edit');

    //    yunalishlar
    Route::get('/yunalishlar', [YunalishlarController::class, 'index'])->name('yunalishlar.index');
    Route::post('/yunalishlar', [YunalishlarController::class, 'create'])->name('yunalishlar.create');
    Route::post('/yunalishlar/delete', [YunalishlarController::class, 'delete'])->name('yunalishlar.delete');
    Route::post('/yunalishlar/{id}/edit', [YunalishlarController::class, 'edit'])->name('yunalishlar.edit');

    //fakultet kafedra uchun route
    Route::get('/fakultet_kafedra', [FakKafedraController::class, 'index'])->name('fakultet_kafedra.index');
    Route::post('/fakultet_kafedra', [FakKafedraController::class, 'create'])->name('fakultet_kafedra.create');
    Route::post('/fakultet_kafedra/delete', [FakKafedraController::class, 'delete'])->name('fakultet_kafedra.delete');
    Route::post('/fakultet_kafedra/{id}/edit', [FakKafedraController::class, 'edit'])->name('fakultet_kafedra.edit');
    //    uquv_yili_ohtm
    Route::get('/uquv_yili_ohtm', [UquvYiliOhtmController::class, 'index'])->name('uquv_yili_ohtm.index');
    Route::post('/uquv_yili_ohtm', [UquvYiliOhtmController::class, 'create'])->name('uquv_yili_ohtm.create');
    Route::post('/uquv_yili_ohtm/delete', [UquvYiliOhtmController::class, 'delete'])->name('uquv_yili_ohtm.delete');
    Route::post('/uquv_yili_ohtm/{id}/edit', [UquvYiliOhtmController::class, 'edit'])->name('uquv_yili_ohtm.edit');

    //   . dars_vaqti
    Route::get('/dars_vaqti', [DarsVaqtiController::class, 'index'])->name('dars_vaqti.index');
    Route::post('/dars_vaqti', [DarsVaqtiController::class, 'create'])->name('dars_vaqti.create');
    Route::delete('/dars_vaqti/{id}', [DarsVaqtiController::class, 'delete'])->name('dars_vaqti.delete');
    Route::put('/dars_vaqti/{id}/edit', [DarsVaqtiController::class, 'edit'])->name('dars_vaqti.edit');

    //   . dars_jadvali
    Route::get('/dars_jadvali', [DarsJadvaliController::class, 'index'])->name('dars_jadvali.index');
    Route::post('/dars_jadvali', [DarsjadvaliController::class, 'create'])->name('dars_jadvali.create');
    Route::delete('/dars_jadvali/{id}', [DarsjadvaliController::class, 'delete'])->name('dars_jadvali.delete');
    Route::put('/dars_jadvali/{id}/edit', [DarsjadvaliController::class, 'edit'])->name('dars_jadvali.edit');

    // xonalar
    Route::get('/xonalar', [XonalarController::class, 'index'])->name('xonalar.index');
    Route::post('/xonalar/create', [XonalarController::class, 'create'])->name('xonalar.create');
    Route::delete('/xonalar/{id}', [XonalarController::class, 'delete'])->name('xonalar.delete');
    Route::put('/xonalar/{id}/edit', [XonalarController::class, 'edit'])->name('xonalar.edit');

    // Jurnal
    Route::get('/jurnal', [JurnalController::class, 'index'])->name('jurnal.index');
    Route::post('/jurnal/create', [JurnalController::class, 'create'])->name('jurnal.create');
    Route::delete('/jurnal/{id}', [JurnalController::class, 'delete'])->name('jurnal.delete');
    Route::put('/jurnal/{id}/edit', [JurnalController::class, 'edit'])->name('jurnal.edit');
    // Guruh
    Route::get('/guruh', [GuruhController::class, 'index'])->name('guruh.index');
    Route::post('/guruh/create', [GuruhController::class, 'create'])->name('guruh.create');
    Route::delete('/guruh/{id}', [GuruhController::class, 'delete'])->name('guruh.delete');
    Route::put('/guruh/{id}/edit', [GuruhController::class, 'edit'])->name('guruh.edit');

    //kurslar uchun route
    Route::get('/kurslar', [KurslarController::class, 'index'])->name('kurslar.index');
    Route::post('/kurslar', [KurslarController::class, 'store'])->name('kurslar.store');
    Route::delete('kurslar/{id}', [KurslarController::class, 'delete'])->name('kurslar.delete');
    Route::put('/kurslar/{id}/edit', [KurslarController::class, 'edit'])->name('kurslar.edit');

    //Barcha fakultet va kafedralar
    Route::get('/fakultet', [FakultetBoshController::class, 'index'])->name('fakultet_bosh.index');

    //Barcha kafedralar
    Route::get('/kafedra/{id}', [KafedraBoshController::class, 'index'])->name('kafedra_bosh.index');

    //Barcha yunalishlar
    Route::get('/yunalish_logo', [YunalishBoshController::class, 'index'])->name('yunalish_bosh.index');


    //videmost uchun
    Route::get('/videmost', [VidemostController::class, 'index'])->name('videmost.index');
    Route::post('/videmost/create', [VidemostController::class, 'create'])->name('videmost.create');
    Route::put('/videmost/{id}/edit', [VidemostController::class, 'edit'])->name('videmost.edit');

    //videmost_baho
    Route::get('/videmost_baho/{id?}', [VidemostBahoController::class, 'index'])->name('videmost_baho.index');
    Route::put('/videmost_baho/{id?}/edit', [VidemostBahoController::class, 'edit'])->name('videmost_baho.edit');


    //Mashg'ulot jadvali
    Route::get('/jadval_excel', [JadvalExelController::class, 'index'])->name('jadval_excel.index');
    Route::post('/jadval_excel/create', [JadvalExelController::class, 'create'])->name('jadval_exel.create');
    Route::put('/jadval_excel/{id}/edit', [JadvalExelController::class, 'edit'])->name('jadval_exel.edit');
    Route::delete('/jadval_excel/{id}', [JadvalExelController::class, 'delete'])->name('jadval_exel.delete');


    //kunlik nazorat
    Route::get('/kunlik_nazorat/', [KunlikNazoratController::class, 'index'])->name('get_kunlik_nazorat.index');
    //kunlik nazorat yutuq
    Route::post('/kunlik_nazorat/create', [KunlikNazoratController::class, 'create'])->name('kunlik_nazorat.create');
    //kunlik nazorat yutuq
    Route::delete('/kunlik_nazorat/{id}', [KunlikNazoratController::class, 'delete'])->name('kunlik_nazorat.delete');




    //qayta-topshirish uchun
    Route::get('/qayta_topshirish', [QaytaTopshirishController::class, 'index'])->name('qayta_topshirish.index');
    Route::post('/qayta_topshirish/create', [QaytaTopshirishController::class, 'create'])->name('qayta_topshirish.create');
    Route::put('/qayta_topshirish//{id}/edit', [QaytaTopshirishController::class, 'edit'])->name('qayta_topshirish.edit');
    Route::delete('/qayta_topshirish//{id}', [QaytaTopshirishController::class, 'delete'])->name('qayta_topshirish.delete');
});



?>
