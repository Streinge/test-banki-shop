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

Route::get('/images/{column}/{order}', action: 'App\Http\Controllers\MainController@displaysInfo')->name('images');

Route::get('/download/{filename}', action: 'App\Http\Controllers\MainController@downloadsImage')->name('download');

Route::get('/api/images/{id}', action: 'App\Http\Controllers\ApiController@returnsJsonId')->name('apiId');

Route::get('/api/images/', action: 'App\Http\Controllers\ApiController@returnsJsonAll')->name('apiAll');
