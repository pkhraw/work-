<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    protected $table = 'treasury';
    public $timestamps = false;

    public function application_master(){
    	return $this->hasMany('App\Application_master');
    }
}
