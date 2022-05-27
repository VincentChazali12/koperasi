<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/', AnggotaController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('pokok', PokokController::class);
Route::resource('qurban', QurbanController::class);
Route::resource('hariraya', HariRayaController::class);
Route::resource('detailQurban', DetailQurbanController::class);
Route::resource('detailHariRaya', DetailHariRayaController::class);
Route::resource('modal', ModalController::class);

Route::resource('piutang', PiutangController::class);
Route::get('pokok.report', 'PokokController@report');
Route::post('simpanQurban', 'DetailQurbanController@store1')->name('simpanQurban');
Route::post('simpanHariRaya', 'DetailHariRayaController@store1')->name('simpanHariRaya');
Route::get('suratQurban', 'QurbanController@surat');
Route::get('suratHariRaya', 'HariRayaController@surat');



Route::get('print', function () {
    return view('printForm');
});
Route::get('kasMasuk', function () {
    return view('kasMasuk');
});
Route::get('kasKeluar', function () {
    return view('kasKeluar');
});