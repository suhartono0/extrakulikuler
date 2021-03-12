<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\RombelController as AdminRombel;
use App\Http\Controllers\Admin\RayonController as AdminRayon;
use App\Http\Controllers\Admin\SiswaController as AdminSiswa;
use App\Http\Controllers\Admin\UpdController as AdminUpd;
use App\Http\Controllers\Admin\SenbudController as AdminSenbud;
use App\Http\Controllers\Admin\InstructureController as AdminInstruktur;
use App\Http\Controllers\Admin\GurusenbudController as AdminGS;
use App\Http\Controllers\Admin\KoordinatorController as AdminKoordinator;
use App\Http\Controllers\Admin\UpdprodController as AdminUpdprod;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Route::resource('/', AdminUser::class);
    Route::resource('user', AdminUser::class);
    Route::resource('rombel', AdminRombel::class);
    Route::resource('rayon', AdminRayon::class);
    Route::resource('siswa', AdminSiswa::class);
    Route::resource('upd', AdminUpd::class);
    Route::resource('senbud', AdminSenbud::class);
    Route::resource('updprod', AdminUpdprod::class);
    Route::resource('instruktur', AdminInstruktur::class);
    Route::resource('gurusenbud', AdminGS::class);
    Route::resource('koordinator', AdminKoordinator::class);
});






