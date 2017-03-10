<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}
    
    function dashboard() {
	    return view('hero-manager/index');
    }
    
    function getAssetBankPhoto(Request $request) {
		$assetID = $request->input('asset-bank-id');
		header("Location: http://assetbankapi.cranleigh.org/forwebsite/".$assetID."/photo/2880");
		exit();
    }

}
