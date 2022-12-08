<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\ContactController;
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

Route::resource('getContact', ContactController::class);
Route::get('/contact-delete/{id}', [ContactController::class, 'destroy'])->name('contact-delete');
Route::post('/sort-table', [ContactController::class, 'sort'])->name('sort-table');
Route::post('/search-table', [ContactController::class, 'search'])->name('search-table');

