<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserAction;
use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[PagesController::class,'inicio'])->name('index');
Route::get('novedades',[PagesController::class,'novedades'])->name('novedades');
Route::get('populares',[PagesController::class,'populares'])->name('populares');
Route::get('registro',[PagesController::class,'registro'])->name('chollo.registro');
Route::post('crear',[PagesController::class,'crear'])->name('chollo.crear');
//Route::get('editar/{id?}',[PagesController::class, 'editar'])->name('chollo.editar');
// Route::put('editar/{id}', [ PagesController::class, 'actualizar' ]) -> name('chollo.actualizar');
// Route::delete('eliminar/{id}', [ PagesController::class, 'eliminar' ]) -> name('chollo.eliminar'); 
Route::get('editar/{id?}',[UserAction::class, 'editar'])->name('chollo.editar');
Route::put('editar/{id}', [ UserAction::class, 'actualizar' ]) -> name('chollo.actualizar');
Route::delete('eliminar/{id}', [ UserAction::class, 'eliminar' ]) -> name('chollo.eliminar'); //
Route::get('individual/{id}',[PagesController::class,'individual']) ->name('chollo.individual');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
