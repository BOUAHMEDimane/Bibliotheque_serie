<?php

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
});
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\ContactsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/series', [SeriesController::class, 'index'])->name('series');
Route::get('/series/{url}',[SeriesController::class, 'show'])->name('serie');
Route::get('/contact', [ContactsController::class, 'index'])->name('contact');


