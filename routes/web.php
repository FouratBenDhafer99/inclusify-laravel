<?php

use App\Models\Skill;
use App\Models\Question;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\events\EventController;
use App\Http\Controllers\events\CategorieController;

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

Route::group(['prefix'=>'admin/skills', 'as'=>'admin.skill.', 'middleware' => 'auth'], function () {
    //Route::get('', ['as' => 'list', 'uses' => 'App\Http\Controllers\backoffice\SkillController@skillList']);
    Route::view('', 'backoffice.pages.skills.skill_list', ['skills' => Skill::all()])->name('list');
    Route::get('form/{id?}', ['as' => 'form', 'uses' => 'App\Http\Controllers\backoffice\SkillController@skillForm']);
    Route::post('add', ['as' => 'add', 'uses' => 'App\Http\Controllers\backoffice\SkillController@addSkill']);
    Route::put('update/{id}', ['as' => 'update', 'uses' => 'App\Http\Controllers\backoffice\SkillController@updateSkill']);
    Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'App\Http\Controllers\backoffice\SkillController@deleteSkill']);
});

Route::group(['prefix'=>'admin/questions', 'as'=>'admin.question.', 'middleware' => 'auth'], function () {
    Route::view('', 'backoffice.pages.questions.question_list', ['questions' => Question::with('skill')->get()])->name('list');
    Route::get('form/{id?}', ['as' => 'form', 'uses' => 'App\Http\Controllers\backoffice\QuestionController@questionForm']);
    Route::post('add', ['as' => 'add', 'uses' => 'App\Http\Controllers\backoffice\QuestionController@addQuestion']);
    Route::put('update/{id}', ['as' => 'update', 'uses' => 'App\Http\Controllers\backoffice\QuestionController@updateQuestion']);
    //Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'App\Http\Controllers\backoffice\SkillController@deleteSkill']);
});

//Frontoffice
Route::group(['prefix'=>'skills', 'as'=>'skill.', 'middleware' => 'auth'], function () {
    Route::get('', ['as' => 'list', 'uses' => 'App\Http\Controllers\frontoffice\SkillController@listSkills']);
    Route::get('start/{skillId}', ['as' => 'start_quiz', 'uses' => 'App\Http\Controllers\frontoffice\SkillController@startQuiz']);
    Route::get('play/{skillId}', ['as' => 'play_quiz', 'uses' => 'App\Http\Controllers\frontoffice\SkillController@playQuiz']);
    Route::put('submit/{quizId}', ['as' => 'submit_quiz', 'uses' => 'App\Http\Controllers\frontoffice\SkillController@submitQuiz']);
    Route::get('result/{quizId}', ['as' => 'result_quiz', 'uses' => 'App\Http\Controllers\frontoffice\SkillController@resultQuiz']);
});

Route::group(['middleware' => 'auth'], function () {
    //Route::resource('user', 'App\Http\Controllers\backoffice\UserController', ['except' => ['show']]);
    Route::get('friends', ['as' => 'friends', 'uses' => 'App\Http\Controllers\frontoffice\TestController@friends']);
    Route::get('jobs', ['as' => 'jobs', 'uses' => 'App\Http\Controllers\frontoffice\TestController@jobs']);
    Route::get('newsfeed', ['as' => 'newsfeed', 'uses' => 'App\Http\Controllers\frontoffice\TestController@newsfeed']);
    Route::get('shop', ['as' => 'shop', 'uses' => 'App\Http\Controllers\frontoffice\TestController@shop']);
    Route::get('product', ['as' => 'product', 'uses' => 'App\Http\Controllers\frontoffice\TestController@product']);
    Route::get('events', ['as' => 'product', 'uses' => 'App\Http\Controllers\frontoffice\TestController@events']);
});


////////////////////////******************Start E V E N T S********************////////////////////////////////////////

//Backoffice
Route::middleware(['web'])->group(function () {
    Route::resource('/admin/events', EventController::class);
    
    Route::post('/admin/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/admin/events', [EventController::class, 'store'])->name('events.store');
    Route::delete('/admin/events/deleteAll',[EventController::class, 'deleteAll'])->name('events.deleteAll');
    Route::get('/admin/events/search', [EventController::class, 'search'])->name('events.search');
    Route::get('/get-google-meet-link', [EventController::class, 'generateGoogleMeetLink'])->name('events.generateGoogleMeetLink');
    
    Route::resource('/admin/categories', CategorieController::class);

    Route::post('/admin/categories/{event}', [CategorieController::class, 'destroy'])->name('categories.destroy');
    Route::get('/admin/categories/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [CategorieController::class, 'store'])->name('categories.store');
    Route::post('/admin/categories/deleteAll', [App\Http\Controllers\events\CategorieController::class, 'deleteAll'])->name('categories.deleteAll');
    Route::get('/admin/categories/search', [CategorieController::class, 'search'])->name('categories.search');
});


//Frontoffice
Route::group(['prefix' => 'events', 'as' => 'event.', 'middleware' => 'auth'], function () {
    Route::get('', ['as' => 'list', 'uses' => 'App\Http\Controllers\frontoffice\EventController@listEvents']);
    Route::get('join/{event}', ['as' => 'join', 'uses' => 'App\Http\Controllers\frontoffice\EventController@joinEvent']);
    Route::get('cancelJoin/{event}', ['as' => 'cancelJoin', 'uses' => 'App\Http\Controllers\frontoffice\EventController@cancelJoin']);
    Route::get('detail/{event}', ['as' => 'detail', 'uses' => 'App\Http\Controllers\frontoffice\EventController@detail']);
});


/////////////////////////******************End E V E N T S********************////////////////////////////////////////
