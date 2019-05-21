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

Route::get('/', 'WelcomeController@index');
Route::get('/welcomedata', 'WelcomeController@welcomeData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
    GET /steps (index)
    GET /steps/create (create)
    GET /steps/1 (show)
    POST /steps (store)
    GET /steps/1/edit (edit)
    PATCH /steps/1 (update)
    DELETE /steps/1 (destroy)
*/

// Route::get('/steps', 'StepsController@index');
// Route::get('/steps/create', 'StepsController@create');
// Route::get('/steps/{step}', 'StepController@show');
// Route::post('/steps', 'StepsController@store');
// Route::get('/steps/{step}/edit', 'StepsController@edit');
// Route::patch('/steps/{step}', 'StepsController@update');
// Route::delete('/steps/{step}', 'StepsController@destroy');

Route::resource('steps', 'StepsController');
Route::resource('friends', 'FriendsController');
