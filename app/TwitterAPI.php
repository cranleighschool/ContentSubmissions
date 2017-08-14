<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Thujohn\Twitter\Facades\Twitter;

class TwitterAPI extends Model
{
    //
  /*  public function __construct() {
	    $this->twitter = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
    }
    
    public function getUser($user) {
		$twitter = $this->twitter->get("users/show", array("screen_name"=>$user));
		return $twitter;
    }*/
    
    public static function mentions() {
	    return Twitter::get("users/show", array("screen_name"=>"fredbradley"));
    }
}
