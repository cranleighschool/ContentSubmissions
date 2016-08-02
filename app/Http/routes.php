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

Route::get('/', function () {
//	$users = Users->all();
//	var_dump($users);
    return redirect()->route('{school}.submissions.index', ['prep']);
});
Route::group(['prefix'=>'{school}'], function() {
	
	Route::get('/', function($school) {
			return redirect()->route('{school}.submissions.index',[$school]);
	});
	
	Route::resource('submissions', 'SubmissionController');
});
Route::auth();

Route::get('/home', 'HomeController@index');
