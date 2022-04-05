<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\actoresController;
use App\Http\Controllers\peliculasController;
use App\Http\Controllers\graficoController;
use App\Http\Controllers\shopsController;
use App\Http\Controllers\fileController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::view('/dashboard', 'actoresVistas.dashboard');

//Peliculas
Route::get('/peliculas', [peliculasController::class, 'index'])->name('actoresVistas.peliculas');
Route::get('/peliculasactor/{actor_id}', [peliculasController::class, 'peliculasactor'])->name('actoresVistas.peliculasactor');
Route::get('/filmdetailsview/{film_id}', [peliculasController::class, 'filmdetails'])->name('actoresVistas.filmdetailsview');


//Actores
Route::get('/index', [actoresController::class, 'index'])->name('actoresVistas.index');

//tendes
Route::get('stores/', [shopsController::class, 'index'])->name('stores'); 
Route::get('/storedetails/{store_id}', [shopsController::class, 'shopinfo'])->name('storedetails');
Route::get('/comparatiendas', [shopsController::class, 'compare'])->name('comparatiendas');

//varis
Route::get('/grafico', [graficoController::class, 'getdata' ])->name('actoresVistas.grafico');
Route::get('file', [fileController::class, 'createForm'])->name('file');
Route::post('file', [fileController::class, 'fileUpload'])->name('file');
Route::get('/fileview/{file_id}', [fileController::class, 'fileview'])->name('fileview');
Route::get('deletefile/{file_id}', [fileController::class, 'deletefile']);

