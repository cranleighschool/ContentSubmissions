<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Updater;

class StaffBiographies extends Model
{
	use Updater;
	protected $table = 'staff_biographies';
    protected $primaryKey = 'id';   //
    
    public function updater_user() {
	    return $this->hasOne('App\User', 'id', 'updated_by');
    }
    
    public function get_status() {
	    $opt = new \StdClass;
	    $mark = 0;
	    $bio = $this->biography;
	    ob_start();
	    if (!strpos($bio, '</p>')) {
		    $mark--;
		    $opt->missing_p = true;
		    echo $this->icon('danger', 'Missing Paragraphs');
	    }
	    if (substr_count($bio, '</p>')==1) {
		    $mark--;
		    $opt->one_p = true;
		    echo $this->icon('danger', 'Only one paragraph');
	    }
	    if (substr_count($bio, '</p>') > 2) {
		    $mark++;
		    $opt->more_paragraphs = true;
		    echo $this->icon('success', 'At least 3 paragraphs');
	    }
	    if (strlen($bio)>175 && strlen($bio) < 260) {
		    $mark++;
		    $opt->good_length = true;
		    echo $this->icon('success', 'Good length');
	    }
	    if (strlen($bio) > 900 && substr_count($bio, '</p>') < 3) {
		    $mark--;
		    $opt->too_long = true;
		    echo $this->icon('danger', 'Put some paragraphs in this.');
	    }
	    
	    $return = ob_get_contents();
	    ob_end_clean();
	    return $return;
    }
    
    public function icon($color, $text) {
	    return "<span class=\"text-".$color."\"><i data-toggle=\"tooltip\" title=\"".$text."\" class=\"fa fa-fw fa-circle\"></i></span>";
    }
    public function get_name() {
	    $api = new Isamsdb();
	    $username = $this->username;
		$staff = \Cache::remember('isams_staff', 120, function() use ($api) {
			$staff = $api->staff();
			$new_staff = [];
			foreach($staff as $person):
				$x = new \stdClass();
				$x->Initials = $person->Initials;
				$x->Forename = $person->Forename;
				$x->Surname = $person->Surname;
				$new_staff[] = $x;
			endforeach;
			return $new_staff;
		});
		
		$user_obj = \Cache::remember('isams_staff_'.$username, 120, function() use ($staff, $api, $username) {
			return $api->findUserFromUsername($staff, $username);
		});
		
		return $user_obj;
//		$output = $user_obj;
		
		
    }
}
