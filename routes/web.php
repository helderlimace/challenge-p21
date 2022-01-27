<?php

use App\Http\Controllers\ComunicadoController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\TorcedorController;
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
Route::group(['middleware' => 'web'], function (){
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/torcedores', [TorcedorController::class, 'index']);
Route::get('/torcedores/new', [TorcedorController::class, 'new']);
Route::post('/torcedores/add', [TorcedorController::class, 'add']);
Route::get('/torcedores/{id}/edit', [TorcedorController::class, 'edit']);
Route::post('/torcedores/update/{id}', [TorcedorController::class, 'update']);
Route::get('/torcedores/delete/{id}', [TorcedorController::class, 'delete']);
Route::get('/torcedores/import/planilha', [TorcedorController::class, 'formImportPlanilha']);
Route::post('/torcedores/import/planilha/store', [TorcedorController::class, 'storeImportPlanilha']);
Route::get('/torcedores/import/xml', [TorcedorController::class, 'formImportXml']);
Route::post('/torcedores/import/xml/store', [TorcedorController::class, 'storeImportXml']);

Route::get('/comunicados', [ComunicadoController::class, 'index']);
Route::get('/comunicados/new', [ComunicadoController::class, 'new']);
Route::post('/comunicados/add', [ComunicadoController::class, 'add']);
Route::get('/comunicados/{id}/edit', [ComunicadoController::class, 'edit']);
Route::post('/comunicados/update/{id}', [ComunicadoController::class, 'update']);
