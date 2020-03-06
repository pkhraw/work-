<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application_master;

class AjaxController extends Controller
{
   public function post(Request $request){

   	$application = Application_master::where($request->appid);


   	$application->appl_no			=	$request->appid;
	$application->fin_year			=	$request->appid;
	$application->trea_code			=	$request->appid;
	$application->employee_name		= 	$request->appid;
	$application->dependent_name	=	$request->appid;
	$application->relation 			=	$request->appid;
	$application->m_type 			=	$request->appid;
	$application->trea_letter 		=	$request->appid;
	$application->hospital_id 		=	$request->appid;
	$application->remarks 			=	$request->appid;
	$application->t_letter_date 	= 	$request->appid;
     
       $response = array( 
          'status' => 'success',
          'msg' => $request->appid,
      );
      return response()->json($response); 
   }
}
