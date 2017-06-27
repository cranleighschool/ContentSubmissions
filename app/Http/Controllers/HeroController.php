<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
	}
    
    public function dashboard() {
	    return view('hero-manager/index');
    }
    
    public function getAssetBankPhoto(Request $request) {
		$assetID = $request->input('asset-bank-id');
		$url = "https://assetbankapi.cranleigh.org/forwebsite/".$assetID."/photo/2880";

		return redirect(route("insitu", ["cranleigh", $assetID]));

		header("Location: http://assetbankapi.cranleigh.org/forwebsite/".$assetID."/photo/2880");
		exit();
    }
    
    public function HeroSitu($school, int $assetId, string $type=null) {
	    $url = "https://assetbankapi.cranleigh.org/forwebsite/".$assetId."/photo/2880";
//		die($url);
	    return view('hero-manager/situ', ['type' => $type, 'url' => $url]);

    }
    
public function HeroSituPost(Request $request) { //$school, int $assetId, string $type=null) {
		$type = $request->hero_type;
		if (!empty($request->{"asset-bank-id"})) {
		    $url = "https://assetbankapi.cranleigh.org/forwebsite/".$request->{"asset-bank-id"}."/photo/2880";
		} elseif (!empty($request->url)) {
			$url = $request->url;
		} elseif ($request->hasFile('photo') && $request->photo->isValid()) {
			$photo = base64_encode(file_get_contents($_FILES["photo"]["tmp_name"]));
			$extension = $request->photo->extension();

			$image =  "data:image/".$extension.";base64,".$photo;
			$url = $image;
		} else {
			$url = "http://www.socialribbit.com/wp-content/uploads/2011/07/404.jpg";
		}

	    return view('hero-manager/situ', ['type' => $type, 'url' => $url]);

    }
    
}
