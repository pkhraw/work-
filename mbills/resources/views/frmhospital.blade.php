@extends('layouts.sidebar')

@section('content')

<form action="fn_hospital_add" id="frm_add_hospital" name="frm_add_hospital" method="post">
	@csrf
<div class="card shadow mb-4">
        <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Hospital</h6>
                </div>
        <div class="card-body">
             <div class="form-group input-group">             	
                   <input type="text" type="text" class="form-control" name="hospname" value="" required  required placeholder="Hospital Name"autofocus>
             </div>
             <div class="form-group">  

                 <select name ="hospstate" class="form-control">
                     @foreach ($state as $state)
                             <option value=" {{$state->name }}">{{$state->name}}</option>               
                     @endforeach 
                                               
                 </select>
             </div>
             <div class="form-group input-group">             	
                   <input type="text" type="text" class="form-control" name="hospcity" value="" required  placeholder="City Name"autofocus>
             </div>
             <a href="javascript:saveHosp()" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Save</span>
             </a>
            
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