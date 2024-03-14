<?php

use App\Http\Controllers\MainController;
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

Route::get('/', action: 'App\Http\Controllers\MainController@getHomePage')->name('home');

Route::get('/upload', action: 'App\Http\Controllers\MainController@getUploadPage')->name('upload');

Route::post('/upload', action: 'App\Http\Controllers\MainController@storedFiles');

Route::get('/info', action: 'App\Http\Controllers\MainController@displaysInfo')->name('info');
