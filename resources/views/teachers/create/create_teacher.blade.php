@extends('welcome')

 @section('nav')
  @include('layouts.nav')
@stop

@section('content')
 <div class="row">

     @include('partial.errors')
      <form method="post" class="form-horizontal" enctype="multipart/form-data" action="create-teachers" data-parsley-validate ="">
      {{ csrf_field() }}

    <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Login Details</div>
                <div class="panel-body">
                  @include('teachers.create.tdetail')
                </div>
            </div>
    </div>
    
    <div class="col-md-6">          
      <div class="panel panel-primary">
       <div class="panel-heading">Teacher/Staff Profile</div>
       <div class="panel-body">
          <div class="col-sm-10 col-sm-offset-1">
             @include('teachers.create.teacher_profile')
          </div>  
       </div>  
      </div>   
    </div>

    <div class="col-md-6">          
      <div class="panel panel-primary">
       <div class="panel-heading">Teacher/Staff Profile</div>
       <div class="panel-body">
          <div class="col-sm-10 col-sm-offset-1">
            @include('teachers.create.teacher_personal')
          </div>  
       </div>  
      </div>   
    </div>

  <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Teacher/Staff Address</div>
        <div class="panel-body">
          @include('teachers.create.teacher_address')
        </div>  
     </div>     
  </div>

 
  <div class="col-md-6 col-md-offset-3">
    <button type="submit" class="btn btn-primary btn-lg btn-block">
      Register
    </button>
     <br>
  </div>

  </form>

</div>
@stop

@section('script')
<script src="/js/parsley.min.js" type="text/javascript"></script>
 <script src="/js/bootstrap-datepicker.min.js"></script>
   @include('partial.teacher_same_address')
   @include('partial.datepicker')
    @include('partial.javascript')
@stop
