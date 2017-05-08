<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException as GuzzleException;
use Psr7;

class AssetBankController extends Controller
{

	public function __construct() {
		        $this->middleware('auth');

	}   
    
    public function index() {
        return view("asset-bank-download.index");
    }
    
    public function download(Request $request, $school) {
		$panel_type = "warning";

	    $client = new Guzzle();
	    try {
			$res = $client->get("https://assetbankapi.cranleigh.org/forwebsite/".$request->{"asset-bank-id"});
			$statuscode = $res->getStatusCode();
	    	$body = json_decode($res->getbody(), true);
	    			$panel_type = "success";
		} catch (GuzzleException $e) {
			$body = json_decode($e->getResponse()->getBody()->getContents());

			$panel_type = "danger";
			
		    return view ("asset-bank-download.download", ["panel"=>$panel_type, "output" => $body]);
		}

		$body['code'] = 200;

	    return view ("asset-bank-download.download", ["panel"=>$panel_type, "output" => (object) $body, "status" => $statuscode]);
    }
}
