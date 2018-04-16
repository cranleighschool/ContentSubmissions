<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UTMController extends Controller
{
    //
	public function index() {
		return view('utm/index');
	}

	public static function getSources() {
		$results = [
			"Vimeo",
			"YouTube",
			"Google",
			"Mailchimp",
			"Admissions",
			"Facebook",
			"Twitter",
			"Conference",
			"Enterprises"
		];
		asort($results);
		return $results;
	}
}
