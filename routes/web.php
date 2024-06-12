<?php

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

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return redirect('/login');
// });

Auth::routes();

Route::match(['get', 'post'], '/register', function () {
    return redirect('/login');
})->name('register');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

Route::resource('users', UserController::class);

Route::resource('candidates', CandidateController::class);

Route::get('/pilihan', [ChoiceController::class, 'pilihan'])->name('candidates.pilihan');
Route::post('/users-pilih', [ChoiceController::class, 'pilih'])->name('users.pilih');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
