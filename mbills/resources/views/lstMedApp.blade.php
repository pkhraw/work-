@extends('layouts.sidebar')

@section('content')

<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Applications</h1>
          <p class="mb-4">  
          	<a href="/application" class="btn btn-primary btn-icon-split btn-lg">
                <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
                </span>
                <span class="text">New Application</span>
            </a></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 col-md-12">
              <div class="col-md-4"><h6 class="m-0 font-weight-bold text-primary">Medical Bills List</h6></div>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Fin Year</th>
                      <th>Treasury</th>
                      <th>Application No</th>
                      <th>Name</th>
                      <th>Letter</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Fin Year</th>
                      <th>Treasury</th>
                      <th>Application No</th>
                      <th>Name</th>
                      <th>Letter</th>
                      <th>Date</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     @foreach ($application as $application)

                     	<tr>
                     		<td>{{$application->fin_year }}</td>
                     		<td>{{$application->treasury['treasury'] }}</td>
                     		<td><a href="/applicationView/{{$application->appl_no }}/{{$application->fin_year }}">{{$application->appl_no }}</a></td>
                     		<td>{{$application->employee_name }}</td>
                     		<td>{{$application->trea_letter }}</td>
                     		<td>{{$application->t_letter_date }}</td>                  		
                     	</tr>
                     @endforeach 
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection