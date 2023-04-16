<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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


Route::get('/',function () {return view('index');});

Route::post('/',[\App\Http\Controllers\ConnectionController::class,'connect']);

Route::get('/hello', function () {return view('hello');});

Route::get('/liste', function () {return view('liste');});

Route::get('/config', function () {return view('config');});

Route::post('/config',[\App\Http\Controllers\ConfigController::class,'config']);


