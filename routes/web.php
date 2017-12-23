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

Route::group(['middleware' => ['user']], function () {
	Route::get('/project/new', 'PageController@newproject');

	Route::get('/book/new', 'PageController@newBooking');
	Route::get('/book/new/{id}', 'PageController@newBooking');
	Route::get('/book/success', 'PageController@BookingDone');
	Route::post('/booking/create', 'BookingController@newBooking');


	Route::get('/logout', 'AuthController@logout');
});

Route::get('/', 'PageController@landing');

Route::get('/catalogue', 'PageController@getCatalog');

Route::get('/about', 'PageController@about');

Route::get('/contact', 'PageController@contact');

Route::get('/guideline', 'PageController@guideline');

Route::post('/project/new/post/image', 'ProjectController@newProjectImage');
Route::post('/project/new/post', 'ProjectController@newProject');
Route::get('/project/{id}', 'PageController@project');
Route::get('/project', 'PageController@project');


Route::get('/login', 'PageController@login');
Route::post('/auth', 'AuthController@login');