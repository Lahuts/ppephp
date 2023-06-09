<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConfigController;
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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/error', function () {
    return view('indexNoAuth',['error' => '<p class="error"> Vous devez être connecté pour accéder à cette page <p>']);
})->name('indexNoAuth');

Route::get('/logout', function () {
    return view('index',['error' => '<p class="error"> Vous avez été déconnecté <p>']);
})->name('logout');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/hello',function () {
        return view('hello');
    })->middleware(['auth','verified'])->name('hello');
    
    Route::get('/liste',function () {
        return view('liste');
    })->middleware(['auth','verified'])->name('liste');
    
    Route::get('/config',function () {
        return view('config');
    })->middleware(['auth','verified'])->name('config');

    Route::post('/config', [ConfigController::class, 'updateProfil'])->name('config.update');

    Route::get('/configUpdate',function () {
        return view('config', ['success' => '<p class="success"> Votre profil a bien été mis à jour <p>']);
    })->middleware(['auth','verified'])->name('config.success');

    Route::get('/deco',function () {
        Auth::logout();
        return redirect('/logout');
    })->name('logout');
});
require __DIR__.'/auth.php';
