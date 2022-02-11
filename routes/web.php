<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pension;
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

Route::get('/', function () { return view('home'); })->name('pension.index');
Route::get('/create', function () { return view('create'); })->name('pension.create');
Route::get('/export', 'ReportController@export')->name('report.export');
Route::get('/preview', 'ReportController@index');
Route::get('/{pension}/show', function (Pension $pension) { 
    return view('show', compact('pension')); 
})->name('pension.show');

