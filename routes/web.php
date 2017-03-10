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
    
    Route::get('/', function($school) {

		return view('home', ['school'=>$school]);

    });
        
    Route::resource('submissions', 'SubmissionController');
    Route::resource('twitter', 'TwitterAccountsController');
    Route::resource('staff-biographies', 'BiographiesController');
    Route::get('staff-biographies/search/{username}', 'BiographiesController@search');
	Route::get('staff-biographies/find/{username}', 'BiographiesController@search');
	
	Route::get('hero-manager', 'HeroController@dashboard');
	Route::post('hero-manager', 'HeroController@getAssetBankPhoto');
});

Route::get('/isamstest/{username?}', function($username=null) {
	
	$api = new \App\Isamsdb();	
	$staff = Cache::remember('isams_staff', 120, function() use ($api) {
		$staff = $api->staff();
		$new_staff = [];
		foreach($staff as $person):
			$x = new stdClass();
			$x->Initials = $person->Initials;
			$x->Forename = $person->Forename;
			$x->Surname = $person->Surname;
			$new_staff[] = $x;
		endforeach;
		return $new_staff;
	});

	if ($username) {
		$user_obj = Cache::remember('isams_staff_'.$username, 120, function() use ($staff, $api, $username) {
			return $api->findUserFromUsername($staff, $username);
		});
		$output = $user_obj;
//		var_dump($user_obj);
	} else {
		$output = $staff;
//		var_dump($staff);
	}
	
	return response()->json($output);

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