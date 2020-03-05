@extends('layouts.sidebar')

@section('content')
@if($applicationdata->appl_no==0)
<form action="fn_application_add" id="frm_application" name="frm_application" method="POST">
    @csrf
@else
<form action="fn_application_update" id="frm_application" name="frm_application" method="POST">
    @csrf
@endif
	
<meta name="csrf-token" content="{{ csrf_token()}}" />
<div class="card shadow mb-4">
        <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Medical Bill Application</h6>
        </div>
        <div class="card-body">
            <div class="form-group input-group">
                <label for="medtype"  class="control-label col-md-2  requiredField"> Medical Type</label>
                <div class="controls col-md-8 " >
                
                 @if($applicationdata->appl_no==0)
                         @foreach ($medicaltype as $medicaltype)
                                <label class="radio-inline "><input type="radio"  name="medtype" id="medtype" value="{{$medicaltype->id }}" >{{$medicaltype->mdesc}}</label>
                         @endforeach
                 @else
                    @foreach ($medicaltype as $medicaltype)

                        @if($medicaltype->id==$applicationdata->m_type)
                            <label class="radio-inline "><input type="radio"  name="medtype" id="medtype" value="{{$medicaltype->id }}" checked>{{$medicaltype->mdesc}}</label>
                        @else
                            <label class="radio-inline "><input type="radio"  name="medtype" id="medtype" value="{{$medicaltype->id }}" >{{$medicaltype->mdesc}}</label>
                        @endif
                        
                    @endforeach 
                @endif
                
                </div>
           </div>
            <div class="form-group input-group">
                <label for="seltrea"  class="control-label col-md-2 requiredField"> Treasury</label>
                <div class="controls col-md-8 "  style="margin-bottom: 10px">
                    <select name ="seltrea" id="seltrea" class="form-control">
                        @if($applicationdata->appl_no==0)
                            <option value="">Select Treasury</option>
                        @else                            
                            <option value="{{$applicationdata->trea_code}}">{{$applicationdata->treasury['treasury']}}</option>
                        @endif
                     @foreach($treasury as $treasury)
                        <option value="{{$treasury->trea_code}}">{{$treasury->treasury}}</option>
                     @endforeach
                 </select>
                
                </div>
           </div>
           <div class="form-group input-group">
                <label for="txtempname"  class="control-label col-md-2 requiredField"> Employee Name</label>

                @if($applicationdata->appl_no==0)
                    <div class="controls col-md-8 "  style="margin-bottom: 10px">
                      <input type="text" type="text" name="txtempname" id="txtempname" class="form-control" value="" required  placeholder="Enter Employee's Full Name"autofocus>                
                </div>
                @else
                      <div class="controls col-md-8 "  style="margin-bottom: 10px">
                      <input type="text" type="text" name="txtempname" id="txtempname" class="form-control" value="{{$applicationdata->employee_name}}" required  placeholder="Enter Employee's Full Name"autofocus>                
                      </div>
                @endif
               
           </div>
          
            <div class="form-group input-group">
                <label for="txtDname"  class="control-label col-md-2 requiredField"> Dependent Name</label>

                @if($applicationdata->appl_no==0)
                    <div class="controls col-md-4 "  style="margin-bottom: 10px">
                      <input type="text" type="text" name="txtDname" id="txtDname" class="form-control" value="" required  placeholder="Enter Dependent's Full Name"autofocus>                
                    </div>
                @else
                    <div class="controls col-md-4 "  style="margin-bottom: 10px">
                      <input type="text" type="text" name="txtDname" id="txtDname" class="form-control" value="{{$applicationdata->dependent_name}}" required  placeholder="Enter Dependent's Full Name"autofocus>                
                    </div>
                @endif
              
                
                 <div class="controls col-md-4"  style="margin-bottom: 10px">
                    <select name ="selrelation" id="selrelation" class="form-control">
                        @if($applicationdata->appl_no==0)
                             <option value="">Relation</option>
                        @else                            
                            <option value="{{$applicationdata->trea_code}}">{{$applicationdata->relation}}</option>
                        @endif
                      
                     @foreach($relation as $relation)
                        <option value="{{$relation->relation}}">{{$relation->relation}}</option>
                     @endforeach
                 </select>
                
                </div>
           </div>
            <div class="form-group input-group">
                <label for="selHosp"  class="control-label col-md-2 requiredField"> Hospital</label>
                <div class="controls col-md-8 "  style="margin-bottom: 10px">
                    <select name ="selHosp" id="selHosp" class="form-control">
                        @if($applicationdata->appl_no==0)
                            <option value="">Hospital</option>
                        @else                            
                            <option value="{{$applicationdata->hospital['hospital_id']}}">{{$applicationdata->hospital['name']}}-{{$applicationdata->hospital['city']}}</option>
                        @endif                       
                     @foreach($hospital as $hospital)
                        <option value="{{$hospital->hospital_id}}">{{$hospital->name."-".$hospital->city}}</option>
                     @endforeach
                 </select>
                
                </div>
           </div>
            <div class="form-group input-group">
                <label for="txtltr"  class="control-label col-md-2 requiredField"> Treasury Letter No.</label>

                @if($applicationdata->appl_no==0)
                         <div class="controls col-md-4 "  style="margin-bottom: 10px">
                                 <input type="text"  name="txtltr" id="txtltr" class="form-control" value="" required  placeholder="Enter Letter No. From Treasury"autofocus>                    
                          </div>
                @else
                         <div class="controls col-md-4 "  style="margin-bottom: 10px">
                                 <input type="text"  name="txtltr" id="txtltr" class="form-control" value="{{$applicationdata->trea_letter}}" required  placeholder="Enter Letter No. From Treasury"autofocus>                    
                          </div>
                @endif
              
                     @if($applicationdata->appl_no==0)
                            <div class="controls col-md-4"  style="margin-bottom: 10px">
                              <input id="dp1" type="text" name="ltrDate" id="ltrDate" value="{{ date('d-m-Y') }}" size="16" class="form-control">
                              </div>
                        @else                            
                           <div class="controls col-md-4"  style="margin-bottom: 10px">
                              <input id="dp1" type="text" name="ltrDate" id="ltrDate" value="{{  date('d-m-y', strtotime($applicationdata->t_letter_date))  }}" size="16" class="form-control">
                              </div>
                        @endif

               
           </div>
            <div class="form-group input-group">
                <label for="txtRemarks"  class="control-label col-md-2 requiredField"> Remarks</label>
                @if($applicationdata->appl_no==0)
                     <div class="controls col-md-8 "  style="margin-bottom: 10px">
                              <input type="text" type="text" name="txtRemarks" id="txtRemarks" class="form-control" value="" required  placeholder="Remarks"autofocus>                
                      </div>
                @else
                    <div class="controls col-md-8 "  style="margin-bottom: 10px">
                              <input type="text" type="text" name="txtRemarks" id="txtRemarks" class="form-control" value="{{$applicationdata->remarks}}" required  placeholder="Remarks"autofocus>                
                      </div>
                @endif
                
           </div>
            @if($applicationdata->appl_no==0)
                 <input type="hidden" name="saveupdflag" id="saveupdflag" value="s">
            @else                            
                  <input type="hidden" name="saveupdflag" id="saveupdflag" value="u">
                  <input type="hidden" name="Happid" id="Happid" value="{{$applicationdata->appl_no}}">
                   <input type="hidden" name="Hfinyr" id="Hfinyr" value="{{$applicationdata->fin_year}}">
            @endif
             @if($applicationdata->appl_no==0)
                 <a href="javascript:saveApplication()" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Save</span>
                  </a>
             @else
                 <a href="javascript:updateApplication()" class="btn btn-primary btn-icon-split" id="updatebtn">
                    <span class="icon text-white-50">
                      <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Update</span>
                 </a>
             @endif
           
             @if($applicationdata->appl_no!=0)
                     <a href="javascript:#" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                    <i class="fas  fa-angle-double-right"></i>
                            </span>
                            <span class="text">Forward</span>
                    </a>
            @endif

                @if ($message = Session::get('message'))

                <div class="form-group input-group savedmessage" >  
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                    </div>
                </div>
                @endif            
                                         
                    
        </div>
 </div>

</form>

@endsection