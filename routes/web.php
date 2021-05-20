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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('books', 'App\Http\Controllers\BookController');
Route::resource('loans', 'App\Http\Controllers\LoanController');
Route::resource('authors', 'App\Http\Controllers\AuthorController');
// Route::get('test', 'App\Http\Controllers\BookController@index');
// Route::get('/test', [BookController::class, 'index']);