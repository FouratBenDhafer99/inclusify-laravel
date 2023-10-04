<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\events\EventController;

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
		//Route::get('events', ['as' => 'events.index', 'uses' => 'App\Http\Controllers\backoffice\PageController@events']);
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
    Route::get('newsfeed', ['as' => 'newsfeed', 'uses' => 'App\Http\Controllers\frontoffice\NewsfeedController@index']);
});


////////////////////////******************Start E V E N T S********************////////////////////////////////////////
/*
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
    Route::delete('/events/deleteAll', [EventController::class, 'deleteAll'])->name('events.deleteAll');
    Route::resource('events', EventController::class);
});*/

Route::middleware(['web'])->group(function () {
    Route::get('/admin/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/admin/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::get('/admin/events/search', [EventController::class, 'search'])->name('events.search'); 
    Route::delete('/admin/events/deleteAll', [App\Http\Controllers\events\EventController::class, 'deleteAll'])->name('events.deleteAll');
    Route::post('/admin/events/deleteAll', [App\Http\Controllers\events\EventController::class, 'deleteAll'])->name('events.deleteAll');
    Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::resource('events', EventController::class);
});

/////////////////////////******************End E V E N T S********************////////////////////////////////////////