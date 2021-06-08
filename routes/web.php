<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookController;

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

Route::redirect('/', 'home', 301);
Route::middleware('auth')->group(function () {
    Route::get('books/cheapest', 'App\Http\Controllers\BookController@cheapest');
    Route::get('books/longest', 'App\Http\Controllers\BookController@longest');
    Route::get('books/search', 'App\Http\Controllers\BookController@search');
    Route::resource('books', 'App\Http\Controllers\BookController');
    Route::resource('loans', 'App\Http\Controllers\LoanController');
    Route::resource('authors', 'App\Http\Controllers\AuthorController');
});
Route::get('language/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->route('books.index');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
