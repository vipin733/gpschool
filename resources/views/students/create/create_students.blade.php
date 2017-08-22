@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

 <div class="row">
   @include('partial.errors')
  <form method="post" id="myForm" action="/create-students" data-parsley-validate ="" >
  {{ csrf_field() }}
  <div class="col-md-12">

      <div class="col-sm-6">
        <div class="panel panel-primary">
             <div class="panel-heading">Student Profile</div>
             <div class="panel-body">
                <div class="col-sm-10 col-sm-offset-1">                  
                   @include('students.create.student_profile')
                </div>  
             </div>  
        </div>   
      </div>

      <div class="col-sm-6">
       <div class="panel panel-primary">
             <div class="panel-heading">Student Personal Info</div>
             <div class="panel-body">
                <div class="col-sm-10 col-sm-offset-1">                  
                   @include('students.create.student_personal')
                </div>  
             </div>  
        </div>   
      </div>

  </div>

  <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Student Address</div>
        <div class="panel-body">
         @include('students.create.student_address')
        </div>  
     </div>     
  </div> 

  <div class="col-sm-4 col-sm-offset-4">
    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus faa-flash animated" aria-hidden="true"></i> Submit</button>
  </div>


  </form>
 </div>

  @stop

  @section('script')
   <script src="/js/parsley.min.js" type="text/javascript"></script>
   <script src="/js/bootstrap-datepicker.min.js"></script>
   @include('partial.students_same_address')
   @include('partial.datepicker')
    @include('partial.javascript')
   
@stop
