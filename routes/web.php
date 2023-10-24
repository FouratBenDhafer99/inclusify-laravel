<?php

use App\Models\Skill;
use App\Models\Question;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;

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

Route::group(['prefix'=>'admin/skills', 'as'=>'admin.skill.', 'middleware' => 'auth'], function () {
    //Route::get('', ['as' => 'list', 'uses' => 'App\Http\Controllers\backoffice\SkillController@skillList']);
    // Route::view('', 'backoffice.pages.skills.skill_list', ['skills' => Skill::all()])->name('list');
    Route::get('form/{id?}', ['as' => 'form', 'uses' => 'App\Http\Controllers\backoffice\SkillController@skillForm']);
    Route::post('add', ['as' => 'add', 'uses' => 'App\Http\Controllers\backoffice\SkillController@addSkill']);
    Route::put('update/{id}', ['as' => 'update', 'uses' => 'App\Http\Controllers\backoffice\SkillController@updateSkill']);
    Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'App\Http\Controllers\backoffice\SkillController@deleteSkill']);
});

Route::group(['prefix'=>'admin/categories', 'as'=>'admin.category.', 'middleware' => 'auth'], function () {
    Route::view('', 'backoffice.pages.categories.category_list', ['categories' => Category::all()])->name('list');
    Route::get('form/{id?}', ['as' => 'form', 'uses' => 'App\Http\Controllers\backoffice\CategoryController@categoryForm']);
    Route::post('add', ['as' => 'add', 'uses' => 'App\Http\Controllers\backoffice\CategoryController@addCategory']);
    Route::put('update/{id}', ['as' => 'update', 'uses' => 'App\Http\Controllers\backoffice\CategoryController@updateCategory']);
    Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'App\Http\Controllers\backoffice\CategoryController@deleteCategory']);
});

Route::group(['prefix'=>'admin/products', 'as'=>'admin.product.', 'middleware' => 'auth'], function () {
    Route::view('', 'backoffice.pages.products.product_list', ['products' => Product::all()])->name('list');
    Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'App\Http\Controllers\backoffice\ProductController@deleteProduct']);
});


Route::group(['prefix'=>'admin/questions', 'as'=>'admin.question.', 'middleware' => 'auth'], function () {
    // Route::view('', 'backoffice.pages.questions.question_list', ['questions' => Question::with('skill')->get()])->name('list');
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

Route::group(['prefix'=>'products', 'as'=>'product.', 'middleware' => 'auth'], function () {
    Route::view('', 'frontoffice.pages.market.shop',['productList' => Product::all(), 'categoryList' => Category::all() ])->name('list');
    Route::get('product/{id}', 'App\Http\Controllers\frontoffice\ProductController@show')->name('show');
    Route::get('form/{id?}', ['as' => 'form', 'uses' => 'App\Http\Controllers\frontoffice\ProductController@productForm']);
    Route::post('add', ['as' => 'add', 'uses' => 'App\Http\Controllers\frontoffice\ProductController@addProduct']);
    Route::put('update/{id}', ['as' => 'update', 'uses' => 'App\Http\Controllers\frontoffice\ProductController@updateProduct']);
    Route::post('checkout/{id}', ['as' => 'checkout', 'uses' => 'App\Http\Controllers\frontoffice\ProductController@session']);
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
