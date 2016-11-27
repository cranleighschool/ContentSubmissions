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

/*Route::get('/', function () {
	$users = \App\User::all();
	var_dump($users);
//    return redirect()->route('{school}.submissions.index', ['prep']);
});
*/

Route::auth();

Route::group(['domain'=>env('CRAN_SUBDOMAIN').'.{school}.org'], function ($school) {
    
    Route::get('/', function ($school) {
        return redirect()->route('submissions.index', [$school]);
    });
        
    Route::resource('submissions', 'SubmissionController');
    Route::resource('twitter', 'TwitterAccountsController');
});

Route::get('/home', 'HomeController@index');

function get_domain($url=null)
{
//	dd($_SERVER['HTTP_HOST']);
		if ($url===null)
			$url = "http://".$_SERVER['HTTP_HOST'];
      $urlobj=parse_url($url);
      $domain=$urlobj['host'];
      if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        $top_domain = $regs['domain'];
        
        return explode('.', $top_domain)[0];
      }
      return false;
}