<?php
use App\Http\Controllers\mv_upvka\DarajaController;
use App\Http\Controllers\mv_upvka\OhtmAdminController;
use App\Http\Controllers\mv_upvka\AkkreditatsiyaController;
use App\Http\Controllers\mv_upvka\UnvonController;
use App\Http\Controllers\mv_upvka\OhtmController;
use App\Http\Controllers\mv_upvka\YunalishController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/mv_upvka', 'as'=>'mv_upvka.'], function (){
    // OHTM CRUD
    Route::get('/ohtms', [OhtmController::class, 'index'])->name('ohtm.index');
    Route::post('/ohtm/create', [OhtmController::class, 'create'])->name('ohtm.create');
    Route::delete('/ohtm/{id}', [OhtmController::class, 'delete'])->name('ohtm.delete');
    Route::put('/ohtm/{id}/edit', [OhtmController::class, 'edit'])->name('ohtm.edit');
    Route::get('/yunalish/{id}/show', [YunalishController::class, 'show'])->name('yunalish.show');
    Route::get('/yunalishlar/{id}', [YunalishController::class, 'index'])->name('yunalish.index');

    //OHTM ADMIN CRUD
    Route::get('/ohtmadmins', [OhtmAdminController::class, 'index'])->name('ohtmadmin.index');
    Route::post('/ohtmadmin', [OhtmAdminController::class, 'store'])->name('ohtmadmin.store');
    Route::put('/ohtmadmin/{id}/edit', [OhtmAdminController::class, 'edit'])->name('ohtmadmin.edit');
    Route::delete('ohtmadmin/{id}', [OhtmAdminController::class, 'delete'])->name('ohtmadmin.delete');

    //ILMIY UNVON CRUD
    Route::get('/unovns', [UnvonController::class, 'index'])->name('unvon.index');
    Route::post('/unvon', [UnvonController::class, 'create'])->name('unvon.create');
    Route::delete('/unvon/{id}', [UnvonController::class, 'delete'])->name('unvon.delete');
    Route::put('unvon/{id}/edit', [UnvonController::class, 'edit'])->name('unvon.edit');

    //AKKREDITATSIYA CRUD
    Route::get('/akkreditatsiyas', [AkkreditatsiyaController::class, 'index'])->name('akkreditatsiya.index');
    Route::post('/akkreditatsiya/create', [AkkreditatsiyaController::class, 'create'])->name('akkreditatsiya.create');
    Route::delete('/akkreditatsiya/{id}', [AkkreditatsiyaController::class, 'delete'])->name('akkreditatsiya.delete');
    Route::put('/akkreditatsiya/{id}/edit', [AkkreditatsiyaController::class, 'edit'])->name('akkreditatsiya.edit');

    //ILMIY DARAJA CRUD
    Route::get('/darajas', [DarajaController::class, 'index'])->name('daraja.index');
    Route::post('/daraja', [DarajaController::class, 'create'])->name('daraja.create');
    Route::delete('/daraja/{id}', [DarajaController::class, 'delete'])->name('daraja.delete');
    Route::put('daraja/{id}/edit', [DarajaController::class, 'edit'])->name('daraja.edit');
});


