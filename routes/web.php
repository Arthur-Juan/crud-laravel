<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ImovelController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\RegisterController;
use App\Models\Imovel;

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
Route::get('/', [ImovelController::class, 'index']);
Route::get('/imoveis/{id}/remove', [ImovelController::class, 'remover'])->name('imoveis.remove')->middleware('auth');
Route::get('/imoveis/create', [ImovelController::class, 'create']);
Route::get('/imoveis/{id}', [ImovelController::class, 'show']);
Route::resource('imoveis', ImovelController::class)->middleware('auth');

/**
 * Rotas relacionadas a autenticação
 */
Route::get('/register', [RegisterController::class, 'showFormReg'])->middleware('guest')->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

/**
 * Profile Routes
 */

 Route::name('user.')->namespace('user')->prefix('user')->group(function (){

    //View profile 
    Route::get('/profile/me', [UserController::class,'index'])->middleware('auth');

   Route::get('/profile/me/edit', [UserController::class, 'edit'])->middleware('auth')->name('edit');
   Route::put('/profile/me/edit', [UserController::class, 'update'])->middleware('auth')->name('update');
   Route::delete('/profile/me/delete', [UserController::class, 'destroy'])->middleware('auth')->name('delete');
 });