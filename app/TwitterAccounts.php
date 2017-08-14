<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Thujohn\Twitter\Facades\Twitter;

class TwitterAccounts extends Model
{
    protected $table='twitter_accounts';
    protected $guarded=[];
    
	public function getTwitterAttribute() {
		return Twitter::get("users/show", ["screen_name"=> $this->screen_name]);
	}
	public function getAtNameAttribute() {
		return "@".$this->screen_name;
	}
	public function followers() {
		return $this->hasMany("App\Followers", "screen_name", "screen_name")->orderby('id', 'desc');
	}
	public function latestfollower() {
		return $this->hasOne("App\Followers", "screen_name", "screen_name")->orderby('id', 'desc')->take(1);
	}
}
