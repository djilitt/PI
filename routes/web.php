<?php

use App\Http\Controllers\all_studentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ESPController;
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
Route::get('/etudiants', [all_studentsController::class,'index']
)->name('etudiants'); 
Route::get('/', function () {
    return view('index');
})->name('index'); 
Route::get('/tables', function () {
    return view('tables');
})->name('tables');
Route::get('/layout-static', function () {
    return view('layout-static');
})->name('layout-static');
Route::get('/charts', function () {
    return view('charts');
})->name('charts');
Route::get('/layout-sidenav-light', function () {
    return view('layout-sidenav-light');
})->name('layout-sidenav-light');
Route::get('/', function () {
    return view('welcome');
});
Route::controller(ESPController::class)->group(function(){
    Route::get('ESP', 'index');
    Route::get('ESP-export', 'export')->name('ESP.export');
    Route::post('ESP-import', 'import')->name('ESP.import');
});
