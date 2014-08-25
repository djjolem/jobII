<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//
Route::get('/', 'HomeController@home');
Route::get('/newad', 'HomeController@newad');

Route::post('/savead', 'HomeController@savead');
Route::post('/signinup', 'HomeController@signinup');
Route::post('/recover', 'HomeController@recover');
Route::post('/settings', 'HomeController@settings');
Route::post('/commitcv', 'HomeController@commitcv');
Route::post('/myads', 'HomeController@myads');

// TODO: get methodes in case user try to post link (get method)
// TODO: instead get link throught application
// 
Route::get('/settings', 'HomeController@settings');
Route::get('/commitcv', 'HomeController@commitcv');

// TODO: remove unused routes 
// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
