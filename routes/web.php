<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GastosConImpController;
use App\Http\Controllers\GastosSinImpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\GestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

	// auth changes
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


	Route::get('gestiones',[GestionController::class,'index'])->name('gestiones');
	Route::get('users',[UserController::class,'index'])->name('users');
	Route::get('permisos',[PermisoController::class,'index'])->name('permisos');
	Route::get('gastosConImp',[ GastosConImpController::class,'index'])->name('gastosConImp');
	Route::get('gastosSinImp',[ GastosSinImpController::class,'index'])->name('gastosSinImp');

});

