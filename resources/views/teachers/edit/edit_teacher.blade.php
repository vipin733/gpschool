@extends('welcome')

@section('nav')
@include('layouts.nav')
@stop
@section('content')
 <div class="row">
  @include('partial.errors')
    <form method="post" enctype="multipart/form-data"  action="/teacher/{{ $t->reg_no }}/update" data-parsley-validate ="">
    {{ csrf_field() }} {{ method_field('PATCH') }}
 
        <div class="col-md-6">          
            <div class="panel panel-primary">
             <div class="panel-heading">
               @if($t->isStaff())
                 Staff Profile
                @else
                 Teacher Profile
                @endif
             </div>
             <div class="panel-body">
                <div class="col-sm-10 col-sm-offset-1">
                  @include('teachers.edit.edit_teacher_profile')
                </div>  
             </div>  
            </div>   
         </div>

         <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                @if($t->isStaff())
                 Staff Personal
                @else
                 Teacher Personal
                @endif
                </div>
                <div class="panel-body">
                <div class="col-sm-10 col-sm-offset-1">
                  @include('teachers.edit.edit_teacher_personal')
                  </div>
                </div>  
             </div>     
         </div>

         <div class="col-md-12">
          <div class="panel panel-primary">
              <div class="panel-heading">
               @if($t->isStaff())
               Staff Address
              @else
               Teacher Address
              @endif
              </div>
              <div class="panel-body">
                @include('teachers.edit.edit_teacher_address')
              </div>  
          </div>     
        </div>

        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              Update          
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
