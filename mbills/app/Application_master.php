<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application_master extends Model
{
 	 protected $table = 'application_master';
     public $timestamps = false;
     

     public function  treasury(){
     	return $this->hasOne('App\Treasury','trea_code','trea_code');
     }
      public function  hospital(){
     	return $this->hasOne('App\Hospital','hospital_id','hospital_id');
     }
}
