<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@getIndex')->name('index');

Route::get('register', 'Auth\AuthController@getRegister')->name('register');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('login', 'Auth\AuthController@getLogin')->name('login');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout')->name('logout');

Route::get('password/forgot', 'Auth\PasswordController@getEmail')->name('password-forgot');
Route::post('password/forgot', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset')->name('password-reset');

Route::get('topic/new', 'TopicController@getNewTopic')->middleware('auth')->name('new-topic');
Route::post('topic/new', 'TopicController@postNewTopic')->middleware('auth');

Route::put('topic/like', 'TopicController@createLike');
Route::delete('topic/like', 'TopicController@deleteLike');

Route::post('topic/comment', 'TopicController@createComment')->middleware('auth');

Route::get('topic/{id}', 'TopicController@getTopic');