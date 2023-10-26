<?php

use App\Http\Controllers\EmpruntsConrtolleur;
use App\Http\Controllers\LivresConrtolleur;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Livres Routes

Route::prefix('/livre')->name('livre.')->controller(LivresConrtolleur::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::delete('/{livreID}/delete', 'delete')->name('delete');
    Route::get('/{livreID}/edit', 'edit')->name('edit');
    Route::patch('/{livreID}/update', 'update')->name('update');
});

// Emprunts Routes

Route::prefix('/emprunt')->name('emprunt.')->controller(EmpruntsConrtolleur::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{empruntID}', 'show')->name('show');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::delete('/{empruntID}/delete', 'delete')->name('delete');
    Route::get('/{empruntID}/edit', 'edit')->name('edit');
    Route::patch('/{empruntID}/update', 'update')->name('update');
    Route::get('/searchByDate', 'searchByDate')->name('searchByDate');
    Route::get('/search', 'search')->name('search');
});
