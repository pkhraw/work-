<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Medicaltype;
use App\Treasury;
use App\Relation;
use App\Appno;
use App\Application_master;

class DhsController extends Controller
{
    public function DHSAppList(){

    	$medicaltype = Medicaltype::All();
    	$treasury=Treasury::All()->sortBy('treasury');
    	$relation=Relation::All();
    	$hospital=Hospital::All();
    	$finyr=Self::getcurrfinyear();
    	$application=Application_master::where('forward_flag',2)
    					->get();
    	$applicationdata=new Application_master;
    	$applicationdata->appl_no=0; 
    	
    	return view('lstDhsApp', compact('medicaltype','treasury','relation','hospital','application','applicationdata')); 
    }
    public function viewDHSApplication ($appID) {

		$medicaltype = Medicaltype::All();
    	$treasury=Treasury::All()->sortBy('treasury');
    	$relation=Relation::All();
    	$hospital=Hospital::All();
    	$finyr=Self::getcurrfinyear();
    	$application=Application_master::All();   
    	$applicationdata=Application_master::where('appl_no',$appID)->first();  
    							

    	return view('dhsapplication', compact('medicaltype','treasury','relation','hospital','application','applicationdata')); 



    		   		
	}

    public function getcurrfinyear(){
		$currdate = date('Y-m-d');
		$cmonth=(int)substr($currdate,5,2);
		$cyr=(int)substr($currdate,0,4);
		if($cmonth<4)
		{
			$cyr1=$cyr-1;
			$cfin_year=$cyr1."-".$cyr;
		}
		elseif($cmonth>=4)
		{
			$cyr1=$cyr+1;
			$cfin_year=$cyr."-".$cyr1;
		}
		return $cfin_year;
	}
	public function yyyyddmm($dt){
		$data=explode("-",$dt);
		return $data[2]."-".$data[1]."-".$data[0];
	}

}

