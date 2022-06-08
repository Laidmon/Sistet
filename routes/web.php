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

Route::get('/nuevo',function(){
    return view ('newcom');
});

Route::get('/nuevaemp',function(){
    return view ('newcmpy');
});

Route::get('/buscador',function(){
    return view ('search');
});


Route::get('/insertar',function(){
     $comentario = new Comment;
     $comentario -> title = Request :: get('comTitle');
     $comentario -> salarie = Request :: get('salarie');
     $comentario -> equality = Request :: get('equal');
     $comentario -> value = Request :: get('values');
     $comentario -> comments = Request :: get('comment');
     $comentario -> iduser = '1';
     $comentario -> idcomp = '1';     
     $comentario -> total = ((int)Request :: get('values')+ (int)Request :: get('salarie') + (int)Request :: get('equal')) / 3;
     $comentario -> save();    
     return redirect('/');
 });

Route::get('/select','App\Http\Controllers\Companylist@list');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
