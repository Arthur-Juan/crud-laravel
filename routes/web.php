<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ImovelController;
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
Route::get('/imoveis/{id}/remove', [ImovelController::class, 'remover'])->name('imoveis.remove');
Route::resource('imoveis', ImovelController::class);