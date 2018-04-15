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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('default.main');
});
Route::get('/write', function () {
    return view('default.write');
});
Route::get('/list', function () {
    return view('default.list');
});
Route::get('/list/detail/{id}/', function ($id) {
    return view('default.detail', ['id' => $id]);
});
Route::get('/list/modify/{id}', function ($id) {
    return view('default.modify', ['id' => $id]);
});


Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::post('/write', 'ContentController@create');
    Route::get('/list', 'ContentController@list');
    Route::get('/list/{id}', 'ContentController@show');
    Route::post('/modify', 'ContentController@update');
    Route::post('/comment/create', 'CommentController@create');
//    Route::get('/comment/list/','CommentController@list');
    Route::get('/comment/list/{id}','CommentController@list');
    Route::post('/comment/create/re','CommentAddController@create');
});