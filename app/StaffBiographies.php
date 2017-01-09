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
}
