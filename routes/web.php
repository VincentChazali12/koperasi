<?php

use App\Http\Controllers\PiutangMasterController;
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

Route::resource('/', LoginController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('anggota2', Anggota2Controller::class);
Route::resource('pokok', PokokController::class);
Route::resource('qurban', QurbanController::class);
Route::resource('hariraya', HariRayaController::class);
Route::resource('detailQurban', DetailQurbanController::class);
Route::resource('detailHariRaya', DetailHariRayaController::class);
Route::resource('modal', ModalController::class);

Route::resource('piutang', PiutangController::class);
Route::resource('simpananwajib',SimpananWajibController::class);
Route::resource('simulasis',simulasiController::class);
Route::resource('dashboards',DashboardController::class);
Route::resource('sdashboard',DashboardssController::class);
Route::resource('tempatkerjas',TempatkerjaController::class);
Route::resource('tempatkerjas2',Tempatkerja2Controller::class);
Route::get('pokok.report', 'PokokController@report');

Route::post('simpanQurban', 'DetailQurbanController@store1')->name('simpanQurban');
Route::post('keluar', 'Anggota2Controller@keluar')->name('keluar');
Route::post('simpanHariRaya', 'DetailHariRayaController@store1')->name('simpanHariRaya');
Route::get('suratQurban', 'QurbanController@surat');
Route::get('suratHariRaya', 'HariRayaController@surat');
Route::get('suratModal', 'QurbanController@suratm');




Route::get('print', function () {
    return view('printForm');
});
Route::get('printsuratT', function () {
    return view('suratPtabungan');
});
Route::get('sreports', function () {
    return view('hasilsimulasi');
});
Route::resource('login',LoginController::class);
Route::post('authenticate','LoginController@authenticate')->name('authenticate');
Route::get('registers', function () {
    return view('Auth/register');
});
Route::get('logins', function () {
    return view('Auth/login');
});
Route::get('cetaklaporan', function () {
    return view('cetaklaporan');
});
Route::get('updatetk', function () {
    return view('Updatetempatkerja');
});
Route::get('prints', function () {
    return view('suratBSI');
});
Route::get('cetaksurat', function () {
    return view('cetakSurat');
});
// Route::get('simulasi', function () {
//     return view('SImulasi');
// });
// Route::get('hasilsimulasi', function () {
//     return view('hasilsimulasi');});
Route::get('kasMasuk', function () {
    return view('kasMasuk');
});
Route::get('kasKeluar', function () {
    return view('kasKeluar');
});

