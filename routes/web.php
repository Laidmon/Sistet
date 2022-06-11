<?php

use Illuminate\Support\Facades\Route;
use App\Models\Comment;
use App\Models\Company;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','App\Http\Controllers\Companylist@welcome');

Route::get('/comdes/{id}','App\Http\Controllers\Companylist@comdes');
Route::get('/listLocations/{id}','App\Http\Controllers\Companylist@listLocations');

Route::get('/insertar','App\Http\Controllers\CommentCont@insertarcomentario')->middleware('auth');

Route::post('/buscador','App\Http\Controllers\Companylist@buscar');
Route::get('/buscador/ordenas/{i}','App\Http\Controllers\Companylist@orderASC');
Route::get('/buscador/ordendes/{i}','App\Http\Controllers\Companylist@orderDESC');


Route::get('/buscador/valoracion/{i}','App\Http\Controllers\Companylist@busquedavaloracion');

Route::get('/nuevaemp','App\Http\Controllers\Companylist@nuevaemp')->middleware('auth');
Route::get('/select','App\Http\Controllers\Companylist@list')->middleware('auth');
Route::get('/empresa/{i}','App\Http\Controllers\Companylist@detalle');
Route::get('/seleccionar','App\Http\Controllers\Companylist@empresaselect');
Route::get('/insertaremp','App\Http\Controllers\Companylist@insertarempresa')->middleware('auth');
Route::get('/administrar','App\Http\Controllers\Companylist@validarcomentarios')->middleware('auth');
Route::get('/borrar/{i}','App\Http\Controllers\Companylist@comentborrado')->middleware('auth');;
Route::get('/validar/{i}','App\Http\Controllers\Companylist@comentvalidate')->middleware('auth');;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');