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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CommentsController;

/****route pour la page d'aceuille*****/
Route::get('/', [HomeController::class, 'index'])->name('home');

/****route pour la page de la liste des series*****/
Route::get('/series', [SeriesController::class, 'index'])->name('series');

/****route pour la page d'une seul serie*****/
Route::get('/series/{url}',[SeriesController::class, 'show'])->name('serie');

/****route pour la page de la liste des series rechercher *****/
//TO DO
Route::get('/search', [SeriesController::class, 'search'])->name('serie.search');

/****route pour la page du CRUD de serie*****/
Route::resource('admin/series', \App\Http\Controllers\Admin\SeriesController::class);

/****route pour la page contacte*****/
Route::get('/contact', [ContactsController::class, 'index'])->name('contact');
Route::post('/contact', [ContactsController::class, 'send'])->name('send');

/**********route pour les commentaire */
Route::get('/series/{id}', [CommentsController::class, 'index'])->name('comments.index');
Route::post('/comments/{id}', [CommentsController::class, 'store'])->name('comments.store');

/******route pour l'authentification avec jetstream****************/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
