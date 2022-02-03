<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserActionController;
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
Route::delete('eliminar/{id}', [ PagesController::class, 'eliminar' ]) -> name('chollo.eliminar');
Route::get('login',[PagesController::class,'login'])->name('login');
        //Route::get('registro',[PagesController::class,'registro'])->name('chollo.registro');
        //Route::post('crear',[PagesController::class,'crear'])->name('chollo.crear');
        //Route::get('editar/{id?}',[PagesController::class, 'editar'])->name('chollo.editar');
        //Route::put('editar/{id}', [ PagesController::class, 'actualizar' ]) -> name('chollo.actualizar');

Route::get('registro',[UserActionController::class,'registro'])->name('chollo.registro');
Route::post('crear',[UserActionController::class,'crear'])->name('chollo.crear');
Route::get('editar/{id?}',[UserActionController::class, 'editar'])->name('chollo.editar');
Route::put('editar/{id}', [ UserActionController::class, 'actualizar' ]) -> name('chollo.actualizar');
Route::delete('eliminar/{id}', [ UserActionController::class, 'eliminar' ]) -> name('chollo.eliminar'); //


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/auth/logout', [UserActionController::class, 'logout'])->name('logout');