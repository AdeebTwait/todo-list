<?php

use App\Task;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
	
	Route::get('/', function () {
    	return redirect()->route('tasks.show', auth()->user()->id);
	});

	Task::routes();

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/users/{user}', 'UserController@edit')->name('user.edit');
	Route::put('/users/{user}/update', 'UserController@update')->name('user.update');

});




