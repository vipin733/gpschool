@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')
<div class="row studentprofile">
 @include('partial.errors')
  <div class="col-md-10 col-md-offset-1">
   @if($s->status == 1)
    <div class="panel panel-primary">
    @else
    <div class="panel panel-danger">
    @endif
      <div class="panel-heading">
        <h3 class="panel-title">{{$s->student_name}}</h3>
      </div>
      <div class="panel-body">
      <div class="row">
         <h3 style="margin-left:10px;"><b>Profile Details</b></h3>
        <div class="col-sm-4 col-xs-6" style="text-align:right">
        <h4><label for="address">REG. NO.:</label> </h4>
        <h4><label for="address1">CURRENT COURSE:</label></h4>
        <h4><label for="address1">COURSE ADDMISSION:</label></h4>
         <h4><label for="address3">DATE OF CREATION: </label></h4>
        @if($s->last_school)
        <h4><label for="address3">LAST SCHOOL: </label></h4>
        @else
        @endif
        <h4><label for="address3">STATUS: </label></h4>
        @if($s->transportation == 1)
        <h4><label for="address3">TRANSPORTATION STOPPAGE: </label></h4>
        @else
        @endif
       </div>
       <div class="col-sm-5 col-xs-6">
        <h4><label for="address">{{ $s->reg_no }}</label> </h4>
        <h4><label for="address1">{{ $s->courses['name']}}</label></h4>
        <h4><label for="address1">{{ $s->created_courses['name'] }}</label></h4>
        <h4><label for="address3">{{ $s->created_at->format('d/m/Y') }}</label></h4>
        @if($s->last_school)
        <h4><label for="address3">{{ $s['last_school'] }}</label></h4>
        @else
        @endif
         @if( $s->status == 1 )
        <h4><label for="address3">Active</label></h4>
         @else
         <h4><label for="address3">Deactive</label></h4>
         @endif
        @if($s->transportation == 1)
        <h4><label for="address3">{{ $s->stopages['name'] }}</label></h4>
        @else
        @endif
       </div>
       <div class="col-sm-3 col-xs-12">
         <a href="#" class="thumbnail">
         @if(!$s->avatar)
          @if($s->gender == 1)
           <img src="{{ URL::to('/image/student_female.png') }}" data-toggle="modal" data-target="#myModal" alt="{{$s->student_name }}" class="img-rounded" />
          @else
           <img src="{{ URL::to('/image/student_male.png') }}" data-toggle="modal" data-target="#myModal" alt="{{ $s->student_name }}" class="img-rounded" />
          @endif
          @else
          <img src="{{ URL::to('/image/',$s->avatar) }}" data-toggle="modal" data-target="#myModal" alt="{{ $s->student_name }}" class="img-rounded" />
          @endif
         </a>
         @include('students.avatar_form')
       </div>
     </div>
      <div class="row">
        <h3 style="margin-left:10px;"><b>Personal Details</b></h3>
        <div class="col-sm-4 col-xs-6" style="text-align:right">

        <h4><label for="address">FATHER NAME:</label> </h4>
        <h4><label for="address1">MOTHER NAME:</label></h4>
        <h4><label for="address2">DATE OF BIRTH: </label></h4>
        <h4><label for="address3">GENDER: </label></h4>
        @if($s->father_no)
        <h4><label for="address3">FATHER MOB. NO. : </label></h4>
        @else
        @endif
        <h4><label for="address3">EMERGENCY CONTACT NO.: </label></h4>
        @if($s->father_email)
        <h4><label for="address3">FATHER EMAIL: </label></h4>
        @else
        @endif
       </div>
       <div class="col-sm-8 col-xs-6">
        <h4><label for="address">{{ $s->father_name }}</label> </h4>
        <h4><label for="address1">{{ $s->mother_name }}</label></h4>
        <h4><label for="address2">{{ $s->date_of_birth->format('d/m/Y') }}</label></h4>
        @if( $s->gender == 1 )
        <h4><label for="address3">FEMALE</label></h4>
         @else
         <h4><label for="address3">MALE</label></h4>
         @endif
         @if($s->father_no)
        <h4><label for="address3">{{ $s->father_no }}</label></h4>
        @else
        @endif
        <h4><label for="address3">{{ $s->emer_no }}</label></h4>
        @if($s->father_email)
         <h4><label for="address3">{{ $s->father_email }}</label></h4>
        @else
        @endif
       </div>
     </div>
      <div class="row">
        <h3 style="margin-left:10px;"><b>Address</b></h3>
        <div class="col-sm-6">
         <h4><b>Permanent Address</b></h4>
          <address>
            {{ $s->address }}, {{ $s->city['name'] }}<br>
           {{ $s->states['name'] }}, {{ $s->zip_pin }}
          </address>
       </div>
       <div class="col-sm-6">
        <h4><b>Communication Address</b></h4>
          <address>
           {{ $s->address1 }}, {{ $s->ccity['name'] }}<br>
           {{ $s->sstates['name'] }}, {{ $s->zip_pin1 }}
          </address>
       </div>
     </div>
      @if( $s->status == 1 )
        <div class="col-md-10 col-md-offset-1">
         <div class="text-center">
          <a class="btn btn-primary" href="{{ URL::to('/student/' . $s->reg_no.'/edit') }}"><i class="fa fa-pencil-square-o faa-pulse animated" aria-hidden="true"></i> Update Info</a>
          <a class="btn btn-success" href="/create-students"><i class="fa fa-plus faa-pulse animated" aria-hidden="true"></i> Create Student</a>
          <a class="btn btn-warning" href="{{ URL::to('/student/' . $s->reg_no.'/fee') }}"><i class="fa fa-credit-card faa-shake animated" aria-hidden="true"></i> Pay Fee</a>
          <a class="btn btn-info" href="{{ URL::to('/student/' . $s->reg_no.'/fee_detailes') }}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i> Last Fee
          </a>

           <a class="btn btn-default" href="{{ URL::to('/acadmic/' . $s->reg_no.'/c_c_view') }}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i> Char. Cert.
          </a>


           <a class="btn btn-default" href="{{ URL::to('/acadmic/' . $s->reg_no.'/t_c_view') }}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i> T.C.
          </a>

         </div>
        </div>
      @else
        <div class="col-md-10 col-md-offset-1 text-center">
         <div class="text-center">
          <a class="btn btn-primary" href="{{ URL::to('/student/' . $s->reg_no.'/edit') }}"><i class="fa fa-pencil-square-o faa-pulse animated" aria-hidden="true"></i> Update Info
          </a>

          <a class="btn btn-success" href="/create-students"><i class="fa fa-plus faa-pulse animated" aria-hidden="true"></i> Create Student</a>
          <a class="btn btn-info" href="{{ URL::to('/student/' . $s->reg_no.'/fee_detailes') }}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i> Last Fee
          </a>

          <a class="btn btn-default" href="{{ URL::to('/acadmic/' . $s->reg_no.'/c_c_view') }}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i> Char. Cert.
          </a>

          <a class="btn btn-default" href="{{ URL::to('/acadmic/' . $s->reg_no.'/t_c_view') }}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i> T.C.
          </a>

         </div>
        </div>
      @endif
      </div>
    </div>
  </div>

</div>


@stop

@section('script')
  <script type="text/javascript" src="/js/dropzone.js"></script>
  <script src="/js/parsley.min.js" type="text/javascript"></script>
@stop
