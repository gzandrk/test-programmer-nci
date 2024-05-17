<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::controller(TransaksiController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/historyCust/{nama_cust}', 'history')->name('historyCust');
    Route::patch('/retur/{id_transaksi}', 'update')->name('retur.update');
});
