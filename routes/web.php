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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('main');
});
Route::get('/kakao', function () {
    return view('default.kakao');
});

Route::get('/calendar', function () {
    return view('default.calendar');
});

//게시판
Route::get('/write', function () {
    return view('default.content.write');
});

Route::get('/list', function () {
    return view('default.content.list');
});
Route::get('/list/detail/{id}/', function ($id) {
    return view('default.content.detail', ['id' => $id]);
});
Route::get('/list/modify/{id}', function ($id) {
    return view('default.content.modify', ['id' => $id]);
});

//todolist
Route::get('/todo', function () {
    return view('default.todo');
});


//etc
Route::get('/test', function () {
    return view('default.test', ['name' => 'test']);
});
Route::get('/default', function () {
    return view('default.default');
});


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
        Route::post('/write', 'ContentController@create');
        Route::get('/list', 'ContentController@list');
        Route::get('/list/{id}', 'ContentController@show');
        Route::post('/modify', 'ContentController@update');
        Route::post('/comment/create', 'CommentController@create');
//    Route::get('/comment/list/','CommentController@list');
        Route::get('/comment/list/{id}', 'CommentController@list');
        Route::post('/comment/create/re', 'CommentAddController@create');
        Route::get('/account', 'AccountController@list');
        Route::get('/getTodo', 'TodoController@show');
        Route::post('/addTodo', 'TodoController@store');
        Route::post('/done', 'TodoController@update');
        Route::delete('/erase/{id}', 'TodoController@destroy');
    });
});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
// Route::get('/map', 'ContentController@create');

});

Auth::routes();
Route::get('/auth/logout', 'NaverAuthController@getLogout');
Route::get('/auth/naver', 'NaverAuthController@redirectToProvider');
Route::get('/auth/naver/callback', 'NaverAuthController@handleProviderCallback');
//Route::get('login/kakao', 'Auth\LoginController@redirectToProvider');
//Route::get('login/kakao/callback', 'Auth\LoginController@handleProviderCallback');
//Route::get('/home', 'HomeController@index')->name('home');
