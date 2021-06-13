<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\Excel;
use App\Exports\BukuExport;
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
// Route halaman
Route::get('/buku',[BukuController::class,'index']);
// Route untuk mencari
Route::get('/cari',[BukuController::class,'carijoin']);
// Route Eksport Excel
Route::get('/export', 'BukuController@export');