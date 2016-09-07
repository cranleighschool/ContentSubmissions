<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    //
    protected $table='schools';
    protected $guarded=[];
    
    public function get_site()
    {
        $arr = explode(".", $_SERVER['HTTP_HOST']);
        return $arr[1];
    }
}
