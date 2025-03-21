<?php

use App\Http\Controllers\ohtm_fakkafboshliq\BahoJurnalController as Ohtm_fakkafboshliqBahoJurnalController;
use App\Http\Controllers\ohtm_fakkafboshliq\FanBiriktirishController;
use App\Http\Controllers\ohtm_fakkafboshliq\FanlarUqituvchiController;
use App\Http\Controllers\ohtm_fakkafboshliq\GuruhController;
use App\Http\Controllers\ohtm_fakkafboshliq\IntoFanlarController;
use App\Http\Controllers\ohtm_fakkafboshliq\IntoUqituvchiController;
use App\Http\Controllers\ohtm_fakkafboshliq\JurnalUqituvchiController;
use App\Http\Controllers\ohtm_fakkafboshliq\KafboshUqituvchiController;
use App\Http\Controllers\ohtm_fakkafboshliq\KunlikNazoratController;

use App\Http\Controllers\ohtm_fakkafboshliq\KafHujjatController;

use App\Http\Controllers\ohtm_fakkafboshliq\MavzularController;
use App\Http\Controllers\ohtm_fakkafboshliq\UqituvchilarController;
use App\Http\Controllers\ohtm_fakkafboshliq\YillikRejaController;
use App\Http\Controllers\ohtm_uqituvchi\BahoJurnalController;
use App\Http\Controllers\ohtm_uqituvchi\BahoOraliqController;
use App\Http\Controllers\ohtm_uqituvchi\BahoYakuniyController;
use App\Http\Controllers\ohtm_uqituvchi\DarsjadvaliUqituvchiController;
use App\Http\Controllers\ohtm_uqituvchi\DarsKunController;
use App\Http\Controllers\ohtm_uqituvchi\DarsKunMustaqilTopshiriqController;
use App\Http\Controllers\ohtm_uqituvchi\DarsKunOraliqController;
use App\Http\Controllers\ohtm_uqituvchi\DarsKunQaytaTopshirishController;
use App\Http\Controllers\ohtm_uqituvchi\DarsKunYakuniyController;
use App\Http\Controllers\ohtm_uqituvchi\GuruhlarUqituvchiController;
use App\Http\Controllers\ohtm_uqituvchi\HomeUqituvchiController;
use App\Http\Controllers\ohtm_uqituvchi\HujjatlarController;
use App\Http\Controllers\ohtm_uqituvchi\JurnalBahoController;
use App\Http\Controllers\ohtm_uqituvchi\MavzuController;
use App\Http\Controllers\ohtm_uqituvchi\MavzukiritUqituvchiController;
use App\Http\Controllers\ohtm_uqituvchi\MustaqilTopshiriqController;
use App\Http\Controllers\ohtm_uqituvchi\NashrController;
use App\Http\Controllers\ohtm_uqituvchi\OraliqController;
use App\Http\Controllers\ohtm_uqituvchi\QaytaTopshirishController;
use App\Http\Controllers\ohtm_uqituvchi\TinglovchiGuruhController;
use App\Http\Controllers\ohtm_uqituvchi\Uqituvchi_shax_malController;
use App\Http\Controllers\ohtm_uqituvchi\UqituvchiFanlarController;
use App\Http\Controllers\ohtm_uqituvchi\UqituvchiGuruhController;
use App\Http\Controllers\ohtm_uqituvchi\VidemostBahoController;
use App\Http\Controllers\ohtm_uqituvchi\VidemostController;
use App\Http\Controllers\ohtm_uqituvchi\YakuniyController;
use App\Http\Controllers\ohtm_uqituvchi\UqituvchiJadvalController;
use App\Http\Controllers\ohtm_uqituvchi\UqituvchiYutuqlarController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'ohtm_uqituvchi', 'as' => 'uqituvchi.'], function () {

//    uqituvchi_home uchun
    Route::get('/home', [HomeUqituvchiController::class, 'index'])->name('uqituvchi_home.index');

    //uqituvchi_guruhlar
    Route::get('/uqituvchi_guruh', [UqituvchiGuruhController::class, 'index'])->name('uqituvchi_guruh.index');

    //tinglovchi_guruh
    Route::get('/guruh_tinglovchi/{id}', [TinglovchiGuruhController::class, 'index'])->name('guruh_tinglovchi.index');

//    uqituvchi_fanlar uchun
    Route::get('/fanlar_uqituvchi', [UqituvchiFanlarController::class, 'index'])->name('uqituvchi_fanlar.index');
    //    uqituvchi_jurnallar uchun
    Route::get('/fanlar_jurnal/{jurnal_id?}', [UqituvchiFanlarController::class, 'jurnal'])->name('uqituvchi_jurnal.index');

    //    uqituvchi_guruhlar uchun
    Route::get('/guruhlar', [GuruhlarUqituvchiController::class, 'index'])->name('uqituvchi_guruhlar.index');

    //    uqituvchi_darsjadvali uchun
    Route::get('/darsjadvali', [DarsjadvaliUqituvchiController::class, 'index'])->name('uqituvchi_darsjadvali.index');

    //    uqituvchi_mavzu uchun
    Route::get('/mavzukiritish', [MavzukiritUqituvchiController::class, 'index'])->name('uqituvchi_mavzukirit.index');
    Route::post('/mavzu/create', [MavzukiritUqituvchiController::class, 'create'])->name('mavzu.create');
    Route::delete('/mavzu/{id}', [MavzukiritUqituvchiController::class, 'delete'])->name('mavzu.delete');
    Route::put('/mavzu/{id}/edit', [MavzukiritUqituvchiController::class, 'edit'])->name('mavzu.edit');
//
//    Route::post('/dars_kun', [DarsKunController::class, 'create'])->name('dars_kun.create');
    Route::post('/dars_joriy', [DarsKunController::class, 'create'])->name('dars_kun.joriy.create');
    Route::post('/dars_oraliq', [DarsKunOraliqController::class, 'create'])->name('dars_kun.oraliq.create');
    Route::post('/dars_yakuniy', [DarsKunYakuniyController::class, 'create'])->name('dars_kun.yakuniy.create');
    Route::post('/dars_qayta_topshirish', [DarsKunQaytaTopshirishController::class, 'create'])->name('dars_kun.qayta_topshirish.create');
    Route::post('/mustaqil_topshiriq', [DarsKunMustaqilTopshiriqController::class, 'create'])->name('dars_kun.mustaqil.create');

    //baho jurnalga baho qo'yish
    Route::post('/baho_joriy', [BahoJurnalController::class, 'create'])->name('baho.joriy.create');
    Route::put('/baho_joriy/{id}', [BahoJurnalController::class, 'edit'])->name('baho.joriy.edit');

    //Baho oraliq uchun
    Route::post('/baho_oraliq', [BahoOraliqController::class, 'create'])->name('baho.oraliq.create');
    Route::put('/baho_oraliq/{id}', [BahoOraliqController::class, 'edit'])->name('baho.oraliq.edit');

    //Baho yakuniy uchun
    Route::post('/baho_yakuniy', [BahoYakuniyController::class, 'create'])->name('baho.yakuniy.create');
    Route::put('/baho_yakuniy/{id}', [BahoYakuniyController::class, 'edit'])->name('baho.yakuniy.edit');

    //Mustaqil topshiriq uchun
    Route::post('/baho_mustaqil/', [MustaqilTopshiriqController::class, 'create'])->name('baho.mustaqil.create');
    Route::put('/baho_mustaqil/{id}', [MustaqilTopshiriqController::class, 'edit'])->name('baho.mustaqil.edit');

    //Qayta topshirish uchun
    Route::post('/baho_qayta/', [QaytaTopshirishController::class, 'create'])->name('baho.qayta_topshirish.create');
    Route::put('/baho_qayta/{id}', [QaytaTopshirishController::class, 'edit'])->name('baho.qayta_topshirish.edit');

    //Baho uchun
    Route::get('/baho_jurnal/{jurnal_id}', [BahoJurnalController::class, 'index'])->name('baho_jurnal.index');
    Route::get('/baho_jurnal/oraliq/{jurnal_id}', [BahoOraliqController::class, 'index'])->name('baho_oraliq.index');
    Route::get('/baho_jurnal/yakuniy/{jurnal_id}', [BahoYakuniyController::class, 'index'])->name('baho_yakuniy.index');
    Route::get('/baho_jurnal/mustaqil-talim/{id}', [MustaqilTopshiriqController::class, 'index'])->name('baho_mustaqil.index');
    Route::get('/qayta-topshirish/{id}', [QaytaTopshirishController::class, 'index'])->name('qayta_topshirish.index');

    //hujjatlar uchun
    Route::get('/uqituvchi_hujjat/{jurnal_id}', [HujjatlarController::class, 'index'])->name('uqituvchi_hujjat.index');
    Route::post('/uqituvchi_hujjat', [HujjatlarController::class, 'create'])->name('uqituvchi_hujjat.create');
    Route::delete('uqituvchi_hujjat/{id}', [HujjatlarController::class, 'delete'])->name('uqituvchi_hujjat.delete');
    Route::put('/uqituvchi_hujjat/{id}/edit', [HujjatlarController::class, 'edit'])->name('uqituvchi_hujjat.edit');


    // oraliq
    Route::get('/oraliq', [OraliqController::class, 'index'])->name('oraliq.index');
    Route::post('/oraliq/create', [OraliqController::class, 'create'])->name('oraliq.create');
    Route::delete('/oraliq/{id}', [OraliqController::class, 'delete'])->name('oraliq.delete');
    Route::put('/oraliq/{id}/edit', [OraliqController::class, 'edit'])->name('oraliq.edit');

    // yakuniy
    Route::get('/yakuniy', [YakuniyController::class, 'index'])->name('yakuniy.index');
    Route::post('/yakuniy/create', [YakuniyController::class, 'create'])->name('yakuniy.create');
    Route::delete('/yakuniy/{id}', [YakuniyController::class, 'delete'])->name('yakuniy.delete');
    Route::put('/yakuniy/{id}/edit', [YakuniyController::class, 'edit'])->name('yakuniy.edit');
    //Uqituvchi_shax_mal
    Route::get('/uqituvchi_shax_mal', [Uqituvchi_shax_malController::class, 'index'])->name('uqituvchi_shax_mal.index');
    Route::post('/uqituvchi_shax_mal/create', [Uqituvchi_shax_malController::class, 'create'])->name('uqituvchi_shax_mal.create');
    Route::delete('/uqituvchi_shax_mal/{id}', [Uqituvchi_shax_malController::class, 'delete'])->name('uqituvchi_shax_mal.delete');
    Route::put('/uqituvchi_shax_mal/{id}/edit', [Uqituvchi_shax_malController::class, 'edit'])->name('uqituvchi_shax_mal.edit');

    //Nashr uchun
    Route::get('/nashr', [NashrController::class, 'index'])->name('nashr.index');
    Route::post('/nashr/create', [NashrController::class, 'create'])->name('nashr.create');
    Route::delete('/nashr/{id}', [NashrController::class, 'delete'])->name('nashr.delete');
    Route::put('/nashr/{id}/edit', [NashrController::class, 'edit'])->name('nashr.edit');
//
//    //videmost uchun
//    Route::get('/videmost', [VidemostController::class, 'index'])->name('videmost.index');
//    Route::post('/videmost/create', [VidemostController::class, 'create'])->name('videmost.create');
//    Route::put('/videmost/{id}/edit', [VidemostController::class, 'edit'])->name('videmost.edit');

    //videmost_baho
    Route::get('/videmost_baho/{id?}', [VidemostBahoController::class, 'index'])->name('videmost_baho.index');
    Route::get('/videmost_baho', [VidemostBahoController::class, 'generateDOCX'])->name('download.docx');

    //yutuq
    Route::get('/get_yutuq/', [UqituvchiYutuqlarController::class, 'index'])->name('get_uqituvchi_yutuq.index');
    //add yutuq
    Route::post('/add_yutuq/', [UqituvchiYutuqlarController::class, 'create'])->name('uqituvchi_yutuq.create');
    //delete yutuq
    Route::delete('/delete_yutuq/{id}', [UqituvchiYutuqlarController::class, 'delete'])->name('yutuq.delete');

    Route::get('/jadval_excel', [UqituvchiJadvalController::class, 'index'])->name('jadval_excel.index');

    //Kafedra boshlig'i uchun
    Route::middleware('ohtm_fakkafboshliq')->group(function () {

        Route::get('/', [KafboshUqituvchiController::class, 'index'])->name('kaf_bosh_uqituvchi.index');

        Route::get('/uqituvchilar', [UqituvchilarController::class, 'index'])->name('uqituvchilar.index');
        //Fanlar uchun
        Route::get('/fanlar', [FanlarUqituvchiController::class, 'index'])->name('fanlar_uqituvchi.index');
        //Guruhlar uchun
        Route::get('/guruhlar', [ GuruhController::class,'index'])->name('guruh.index');
        //Into uqituvchi uchun
        Route::get('/profile_uqituvchi/{id?}', [IntoUqituvchiController::class, 'index'])->name('into_uqituvchi.index');

        //Into Fanlar uchun
        Route::get('/into_fanlar/{fan_id?}', [IntoFanlarController::class, 'index'])->name('into_fanlar.index');

        //    Mavzular uchun
        Route::get('/mavzular/{jurnal_id?}', [MavzularController::class, 'index'])->name('mavzular.index');


        // KafHujjat

        Route::get('/kafhujjat/{jurnal_id}', [KafHujjatController::class, 'index'])->name('kaf_hujjat.index');

        //  Baho_Jurnal
        Route::get('/kaf_baho_jurnal/{jurnal_id}', [Ohtm_fakkafboshliqBahoJurnalController::class, 'index'])->name('kaf_baho_jurnal.index');

        //Jurnal uchun
        Route::get('/jurnal', [JurnalUqituvchiController::class, 'index'])->name('jurnal_uqituvchi.index');
        Route::post('/jurnal/create', [JurnalUqituvchiController::class, 'create'])->name('jurnal.create');
        Route::delete('/jurnal/{id}', [JurnalUqituvchiController::class, 'delete'])->name('jurnal.delete');
        Route::put('/jurnal/{id}/edit', [JurnalUqituvchiController::class, 'edit'])->name('jurnal.edit');


        //Yillik Reja uchun
        Route::get('/reja', [YillikRejaController::class, 'index'])->name('reja.index');
        Route::post('/reja/create', [YillikRejaController::class, 'create'])->name('reja.create');
        Route::delete('/reja/{id}', [YillikRejaController::class, 'delete'])->name('reja.delete');
        Route::put('/reja/{id}/edit', [YillikRejaController::class, 'edit'])->name('reja.edit');

        //Fan Biriktirish uchun
        Route::get('/fan_biriktirish', [FanBiriktirishController::class, 'index'])->name('fan_uqituvchi.index');
        Route::post('/fan_biriktirish/create', [FanBiriktirishController::class, 'create'])->name('fan_uqituvchi.create');
        Route::delete('/fan_biriktirish/{id}', [FanBiriktirishController::class, 'delete'])->name('fan_uqituvchi.delete');
        Route::put('/fan_biriktirish/{id}/edit', [FanBiriktirishController::class, 'edit'])->name('fan_uqituvchi.edit');
        // mavzu
        Route::get('/mavzu', [MavzuController::class, 'index'])->name('mavzu.index');
        Route::post('/mavzu/create', [MavzuController::class, 'create'])->name('mavzu.create');
        Route::delete('/mavzu/{id}', [MavzuController::class, 'delete'])->name('mavzu.delete');
        Route::put('/mavzu/{id}/edit', [MavzuController::class, 'edit'])->name('mavzu.edit');

        //kunlik nazorats
        Route::get('/kunlik-nazorat', [KunlikNazoratController::class, 'index'])->name('kunlik_nazorat.index');
        Route::put('/kunlik-nazorat/{id}/edit', [KunlikNazoratController::class, 'edit'])->name('kunlik_nazorat.edit');



    });

});
?>
