<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::redirect('/', '/home', 301);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/search', [HomeController::class, 'search'])->name('search_query');
Route::get('/home/randomize', [HomeController::class, 'randomize'])->name('home.randomize');
Route::get('/detail/{id}', [HomeController::class, 'detail']);

Route::get('/home/o-id-asc', [HomeController::class, 'ascid'])->name('home.ascid');
Route::get('/home/o-id-desc', [HomeController::class, 'descid'])->name('home.descid');
Route::get('/home/o-a-z', [HomeController::class, 'ascname'])->name('home.ascname');
Route::get('/home/o-z-a', [HomeController::class, 'descname'])->name('home.descname');
