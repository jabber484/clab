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

Route::get('/', 'PageController@landing');

Route::get('/catalogue', 'PageController@getCatalog');

Route::get('/about', 'PageController@about');

Route::get('/contact', 'PageController@contact');

Route::get('/guideline', 'PageController@guideline');

Route::get('/project/new', 'PageController@newproject');
Route::post('/project/new/post', 'ProjectController@newProject');
Route::get('/project/{id}', 'PageController@project');
Route::get('/project', 'PageController@project');

Route::get('/book/new', 'PageController@newBooking');
Route::get('/book/new/{id}', 'PageController@newBooking');
