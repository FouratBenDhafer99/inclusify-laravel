<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

Auth::routes();

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/admin/dashboard', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['prefix'=>'admin','middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\backoffice\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\backoffice\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\backoffice\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\backoffice\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\backoffice\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\backoffice\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\backoffice\PageController@upgrade']);
});

Route::group(['prefix'=>'admin/profile', 'middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\backoffice\UserController', ['except' => ['show']]);
	Route::get('', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\backoffice\ProfileController@edit']);
	Route::put('', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\backoffice\ProfileController@update']);
	Route::put('password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\backoffice\ProfileController@password']);
});

Route::group([], function () {
    //Route::resource('user', 'App\Http\Controllers\backoffice\UserController', ['except' => ['show']]);
    Route::get('friends', ['as' => 'friends', 'uses' => 'App\Http\Controllers\frontoffice\TestController@friends']);
});

Route::resource('jobs', JobController::class);

