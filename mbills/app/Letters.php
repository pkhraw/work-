<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letters extends Model
{
    protected $table = 'letters';
    public $timestamps = false;

    public function application_master(){
    	return $this->hasOne('App\Application_master');
    }
}


