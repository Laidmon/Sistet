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

Route::get('listLocations/{id}','App\Http\Controllers\Companylist@listLocations');

Route::get('/insertar','App\Http\Controllers\CommentCont@insertarcomentario')->middleware('auth');

Route::get('/buscador','App\Http\Controllers\Companylist@buscar');
Route::get('/nuevaemp','App\Http\Controllers\Companylist@nuevaemp')->middleware('auth');
Route::get('/select','App\Http\Controllers\Companylist@list')->middleware('auth');
Route::get('/empresa/{i}','App\Http\Controllers\Companylist@detalle');
Route::get('/insertaremp','App\Http\Controllers\Companylist@insertarempresa')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');