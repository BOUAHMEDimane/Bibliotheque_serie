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
//Route::get('admin/series', [\App\Http\Controllers\Admin\SeriesController::class, 'index']);
//Route::resource('admin/series', SeriesController::class);
Route::get('/contact', [ContactsController::class, 'index'])->name('contact');
Route::post('/contact', [ContactsController::class, 'send'])->name('send');


Route::get('admin/series', [\App\Http\Controllers\Admin\SeriesController::class, 'index'])->name('serie.crud');
Route::get('admin/series/create', [\App\Http\Controllers\Admin\SeriesController::class, 'create'])->name('serie.create');
Route::post('admin/series/create', [\App\Http\Controllers\Admin\SeriesController::class, 'store'])->name('serie.add');




//Route::post('admin/series/edit/{id}', [\App\Http\Controllers\Admin\SeriesController::class, 'update'])->name('edit_update');
//Route::get('admin/series/edit_recette/{id}', [\App\Http\Controllers\Admin\SeriesController::class, 'edit'])->name('edit_recipe');
//Route::post('admin/series/edit/{id}', [\App\Http\Controllers\Admin\SeriesController::class, 'destroy'])->name('edit_delete');
//Route::post('/series/{url}', [\App\Http\Controllers\Admin\SeriesController::class, 'addComment'])->name('addComment');


