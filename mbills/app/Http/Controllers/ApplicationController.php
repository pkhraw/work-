<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Medicaltype;
use App\Treasury;
use App\Relation;
use App\Appno;
use App\Application_master;
class ApplicationController extends Controller
{
    public function applicationForm(){


    	$medicaltype = Medicaltype::All();
    	$treasury=Treasury::All()->sortBy('treasury');
    	$relation=Relation::All();
    	$hospital=Hospital::All();
    	$finyr=Self::getcurrfinyear();
    	$application=Application_master::All();  

    	$applicationdata=new Application_master;
    	$applicationdata->appl_no=0;   	

    	return view('application', compact('medicaltype','treasury','relation','hospital','application','applicationdata')); 	
	}



	 public function applicationList(){


    	$medicaltype = Medicaltype::All();
    	$treasury=Treasury::All()->sortBy('treasury');
    	$relation=Relation::All();
    	$hospital=Hospital::All();
    	$finyr=Self::getcurrfinyear();
    	$application=Application_master::All();
    	
    	return view('lstMedApp', compact('medicaltype','treasury','relation','hospital','application')); 


		
	}

	public function viewApplication ($appID,$finyear) {

		$medicaltype = Medicaltype::All();
    	$treasury=Treasury::All()->sortBy('treasury');
    	$relation=Relation::All();
    	$hospital=Hospital::All();
    	$finyr=Self::getcurrfinyear();
    	$application=Application_master::All();   
    	$applicationdata=Application_master::where('fin_year',$finyear)
    						->where('appl_no',$appID)->first();  	

    	return view('application', compact('medicaltype','treasury','relation','hospital','application','applicationdata')); 



    		   		
	}

	public function fn_updateApplication(Request $request){
	 $response = array(
          'status' => 'success',
          'msg' => 'll',
      );
      return response()->json($response); 
		//$project = Project::find($request->id);
	}
	public function fn_addApplication(){

		$flag= $_POST['saveupdflag'];
		
		$application=new Application_master;
		$finyr=Self::getcurrfinyear();
		$appnoInstance1=new Appno;

		$app_no=Appno::where('fin_year',$finyr)->first();
		$nextappno=$app_no->app_no+1;
		
		$ltrdate=Self::yyyyddmm($_POST['ltrDate']);

		$appnoInstance1->where('fin_year',$finyr)
					   ->update(['app_no'=> $nextappno]);

		//print_r($_POST);exit;
		$application->appl_no	=	$nextappno;
		$application->fin_year	=	$finyr;
		$application->trea_code	=	$_POST['seltrea'];
		$application->employee_name= $_POST['txtempname'];
		$application->dependent_name=$_POST['txtDname'];
		$application->relation=$_POST['selrelation'];
		$application->m_type=$_POST['medtype'];
		$application->trea_letter=$_POST['txtltr'];
		$application->hospital_id=$_POST['selHosp'];
		$application->remarks=$_POST['txtRemarks'];
		$application->t_letter_date=$ltrdate;

		try {

        	$application->save();
        
        			//$application->update()->where('appl_no',$_POST['Happid'])
        			//->where('fin_year',$_POST['Hfinyr']);

        	
   			return redirect('/application')->with('message', 'Application Saved Successfully with application No  '.$nextappno);

   			
         } catch (Exception $e) {
     	 	  report($e);

      		 return "0";
  		  }

		/*$hospital->name=$_POST['hospname'];
		$hospital->state=$_POST['hospstate'];
		$hospital->city=$_POST['hospcity'];


		try {
        	$hospital->save();
        	
   			return redirect('/hospital')->with('message', 'Hospital added Successfully!');

   			
         } catch (Exception $e) {
     	 	  report($e);

      		 return "0";
  		  }*/
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



