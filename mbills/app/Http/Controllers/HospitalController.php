<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\State;
class HospitalController extends Controller
{
    
	public function showHospital(){
		$hospital = Hospital::All();
		foreach ($hospital as $hospital)
		{
		    var_dump($hospital->name);
		}
	}
	public function showState(){
		$state = State::All();
		return view('frmhospital', compact('state')); 
	}
	public function fn_addHospital(){
		$hospital=new Hospital;
		$hospital->name=$_POST['hospname'];
		$hospital->state=$_POST['hospstate'];
		$hospital->city=$_POST['hospcity'];


		try {
        	$hospital->save();
        	
   			return redirect('/hospital')->with('message', 'Hospital added Successfully!');

   			
         } catch (Exception $e) {
     	 	  report($e);

      		 return "0";
  		  }
	
	}

   
}


