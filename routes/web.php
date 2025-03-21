<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\mv_admin\MvadminController;
use App\Http\Controllers\mv_upvka\MvupvkaController;
use App\Http\Controllers\ohtm_boshliq\OhtmboshliqController;
use App\Http\Controllers\ohtm_fakkafboshliq\KafboshUqituvchiController;
use App\Http\Controllers\ohtm_fakkafboshliq\OhtmfakkafboshliqController;
use App\Http\Controllers\ohtm_uqituvchi\HomeUqituvchiController;
use App\Http\Controllers\ohtm_uquv_bulimi\OhtmuquvbulimiController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Auth\LoginController;

//require __DIR__ . '/user/account.php';


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('auth.login');
//});

Auth::routes();



Route::get('/', [IndexController::class, 'index'])->name('main');
Route::get('/home', [HomeController::class, 'index'])->name('home');


//require __DIR__ . '/mvadmin.php';



//Route::middleware(['mv_admin'])->group(function () {
//    Route::group(['prefix'=>'/mv_admin'], function (){
//        Route::get('/', [MvadminController::class, 'index'])->name('mv_admin_home');
//
//        Route::get('/akkreditatsiya', [AkkreditatsiyaController::class, 'index'])->name('mv_admin_akkre');
//        Route::post('/akkreditatsiya/create', [AkkreditatsiyaController::class, 'create'])->name('mv_admin_akkre_cre');
//
//        Route::get('/logout', [MvadminController::class, 'logout'])->name('mv_admin_logout');
//    });
//});

Route::view('/faol', 'faol');
Route::middleware(['mv_upvka'])->group(function () {
    Route::group(['prefix'=>'/mv_upvka'], function (){
        Route::get('/', [MvupvkaController::class, 'index'])->name('mv_upvka_home');

    });
});
Route::middleware(['ohtm_admin'])->group(function () {
    Route::group(['prefix'=>'/ohtm_admin'], function (){

    });
});
Route::middleware(['ohtm_boshliq'])->group(function () {
    Route::group(['prefix'=>'/ohtm_boshliq'], function (){
        Route::get('/', [OhtmboshliqController::class, 'index'])->name('ohtm_boshliq_home');
    });
});
Route::middleware(['ohtm_uquv_bulimi', 'faol'])->group(function () {
    Route::group(['prefix'=>'/ohtm_uquv_bulimi'], function (){
        Route::get('/', [OhtmuquvbulimiController::class, 'index'])->name('ohtm_uquv_bulimi_home');
    });
});
Route::middleware(['ohtm_fakkafboshliq'])->group(function () {
    Route::group(['prefix'=>'/ohtm_fakkafboshliq'], function (){
        Route::get('/', [OhtmfakkafboshliqController::class, 'index'])->name('ohtm_fakkafbosh_home');
    });
});



//Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

