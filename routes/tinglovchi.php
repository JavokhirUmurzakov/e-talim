<?php
use App\Http\Controllers\ohtm_tinglovchi\HomeTinglovchiController;
use App\Http\Controllers\ohtm_tinglovchi\HujjatlarController;
use App\Http\Controllers\ohtm_tinglovchi\MavzuController;
use App\Http\Controllers\ohtm_tinglovchi\MustaqilTopshiriqController;
use App\Http\Controllers\ohtm_tinglovchi\OraliqTinglovchiController;
use App\Http\Controllers\ohtm_tinglovchi\QaytaTopshirishController;
use App\Http\Controllers\ohtm_tinglovchi\TinglovchiBahoController;
use App\Http\Controllers\ohtm_tinglovchi\TinglovchiFanController;
use App\Http\Controllers\ohtm_tinglovchi\TinglovchiShaxMalController;
use App\Http\Controllers\ohtm_tinglovchi\YakuniyTinglovchiController;
use App\Http\Controllers\ohtm_tinglovchi\YutuqController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ohtm_tinglovchi', 'as' => 'tinglovchi.'], function () {

    // tinglovchi_home uchun
    Route::get('/home', [HomeTinglovchiController::class, 'index'])->name('tinglovchi_home.index');

    //tinglovchi oraliq uchun
    Route::get('/oraliq', [OraliqTinglovchiController::class, 'index'])->name('tinglovchi_oraliq.index');

    //tinglovchi yakuniy page
    Route::get('/yakuniy', [YakuniyTinglovchiController::class, 'index'])->name('tinglovchi_yakuniy.index');

    //tinglovchi_shax_mal
    Route::get('/tinglovchi_shax_mal', [TinglovchiShaxMalController::class, 'index'])->name('tinglovchi_shax_mal.index');
    Route::post('/tinglovchi_shax_mal/create', [TinglovchiShaxMalController::class, 'create'])->name('tinglovchi_shax_mal.create');
    Route::delete('/tinglovchi_shax_mal/{id}', [TinglovchiShaxMalController::class, 'delete'])->name('tinglovchi_shax_mal.delete');
    Route::put('/tinglovchi_shax_mal/{id}/edit', [TinglovchiShaxMalController::class, 'edit'])->name('tinglovchi_shax_mal.edit');

    //tinglovchi fanlar
    Route::get('/fanlar',[TinglovchiFanController::class,'index'])->name('fanlar.index');
    Route::get('/tinglovchi_fan_jurnal/{jurnal_id}', [TinglovchiFanController::class, 'jurnal'])->name('tinglovchi_fan_jurnal.jurnal');

    //tinglovchi baho
    Route::get('/baho_jurnal_joriy/{jurnal_id}', [TinglovchiBahoController::class, 'index'])->name('baho_joriy.index');

    //baho yakuniy
    Route::get('/baho_jurnal_yakuniy/{jurnal_id}', [TinglovchiBahoController::class, 'yakuniy'])->name('baho_yakuniy.yakuniy');

    //baho oraliq
    Route::get('/baho_jurnal_oraliq/{jurnal_id}', [TinglovchiBahoController::class, 'oraliq'])->name('baho_oraliq.oraliq');

    //mustaqil baho
    Route::get('/baho_jurnal_mustaqil/{jurnal_id}', [MustaqilTopshiriqController::class, 'index'])->name('baho_mustaqil.index');

    //baho qayta topshirish
    Route::get('/baho_qayta_topshirish/{jurnal_id}', [QaytaTopshirishController::class, 'index'])->name('qayta_topshirish.index');
    //fan mavzu
    Route::get('/fan_mavzu/{jurnal_id}', [MavzuController::class, 'index'])->name('fan_mavzu.index');
    //fan hujjat
    Route::get('/fan_hujjat/{jurnal_id}', [HujjatlarController::class, 'index'])->name('fan_hujjat.index');
    //yutuq
    Route::get('/get_yutuq/', [YutuqController::class, 'index'])->name('get_tinglovchi_yutuq.index');
    //add yutuq
    Route::post('/add_yutuq/', [YutuqController::class, 'create'])->name('tinglovchi_yutuq.create');
    //delete yutuq
    Route::delete('/delete_yutuq/{id}', [YutuqController::class, 'delete'])->name('yutuq.delete');
});
?>
