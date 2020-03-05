<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
     protected $table = 'hospital';
     public $timestamps = false;

     public function application_master(){
    	return $this->hasMany('App\Application_master');
    }
}
