@extends('welcome')

@section('nav')
@include('layouts.nav')
@stop
@section('content')

 <div class="row">
   @include('partial.errors')
  <form method="POST" action="/student/{{ $s->reg_no }}/update" data-parsley-validate ="">
  {{ csrf_field() }} {{ method_field('PATCH') }}
  <div class="col-md-12">


     <div class="col-sm-6">
        <div class="panel panel-primary">
             <div class="panel-heading">Student Profile</div>
             <div class="panel-body">
                <div class="col-sm-10 col-sm-offset-1">                  
                   @include('students.edit.update_student_profile')
                </div>  
             </div>  
        </div>   
      </div>

      <div class="col-sm-6">
        <div class="panel panel-primary">
             <div class="panel-heading">Student Personal Info</div>
             <div class="panel-body">
                <div class="col-sm-10 col-sm-offset-1">                  
                   @include('students.edit.update_student_personal')
                </div>  
             </div>  
        </div>   
      </div>

  </div>

   <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Student Address</div>
        <div class="panel-body">
         @include('students.edit.update_student_address')
        </div>  
     </div>     
  </div> 

  <div class="col-sm-4 col-sm-offset-4">
    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-wrench faa-wrench animated" aria-hidden="true"></i> Submit</button>
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
