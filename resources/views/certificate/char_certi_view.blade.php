@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')
 @include('certificate.partial_certi.heading_certi')
<div class="row" style="margin-top: 50px;">
 @if(count($s->char_certis))
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-body" style="border-style: double; border-width: 20px;">
		  <div class="text-center">
		  	 <h1><b>Narayani Challenger Convent School</b></h1>
		      <h4>Gangapur (Mangari), Varanasi, U.P.-221202</h4>
		      <h3><strong class="heade_cc">Character Certificate</strong></h3>
		  </div>
      <div class="col-sm-12">
       <div class="pull-right">
       <h3 class="paddingbox">Serial No. <strong>{{  $s->char_certis['id']  }}</strong></h3>
       </div>
       <div class="pull-left">
       <h3 class="paddingbox">Reg No. <strong>{{  $s['reg_no'] }}</strong></h3>
     </div>
     </div>

			 <div class="col-sm-8 col-sm-offset-2">
         <br><br><br>
			 	<h3 class="c-c">

			    This is certified that <strong class="dotted">{{ $s->student_name }}</strong> @if($s->gender == 1) D/o @else S/o @endif <strong class="dotted">Mr. {{ $s->father_name }}</strong> is successfully completed @if($s->gender == 1) her @else his @endif studies from class <strong class="dotted">{{ $s->created_courses['name'] }}</strong> to <strong class="dotted">{{$s->courses['name']}}</strong> from our school as a bright student. @if($s->gender == 1) She @else He @endif successfully completed  @if($s->gender == 1) her @else his @endif high school in the year of <strong class="dotted">{{ $s->char_certis['year_10'] }}</strong> with <strong class="dotted">{{$s->char_certis['grade_10']}}</strong> division

			    @if($s->char_certis[('year_12')])

			    and completed  @if($s->gender == 1) her @else his @endif intermediate in the year <strong class="dotted">{{$s->char_certis['year_12']}}</strong> with <strong class="dotted">{{$s->char_certis['grade_12']}}</strong> division.
			    @else.
			    @endif
			    During schooling  @if($s->gender == 1) her @else his @endif charactor  was very good and deciplind behavior.
			   In school student record @if($s->gender == 1) her @else his @endif date of birth <strong class="dotted">{{$s->date_of_birth->format('d/m/Y')}}</strong>  (in words)  <strong class="dotted">{{$pday}} {{ $month }}, {{ $pyear }}</strong>.
			    <h3 style="margin-left: 10px;">We wish @if($s->gender == 1) her @else him @endif a very bright and successful future.</h3>
			   </h3>
			 </div>
			 <div class="col-sm-10 col-sm-offset-1"><br><br><br><br>
			 	<div class="pull-left"><h3>Date <strong class="dotted">{{ Carbon\Carbon::today()->format('d/m/Y')}}</strong></h3></div>
			 	<div class="pull-right"><h3><strong>Principal</strong></h3></div>
			 </div>
		  </div>

		</div>
		 <div class="text-center">
		  <a name="print_char" class="btn btn-primary" href="{{ URL::to('/acadmic/' . $s->char_certis['id'].'/c_c_print') }}"><i class="fa fa-print faa-pulse animated" aria-hidden="true"></i> Print
		  </a>
		  <a name="print_char" class="btn btn-success" href="{{ URL::to('/acadmic/' . $s->char_certis['id'].'/download_c_c_print') }}"><i class="fa fa-download faa-vertical animated" aria-hidden="true"></i> Save
		  </a>
		  <a name="print_char" class="btn btn-warning" href="{{  URL::to('/acadmic/' . $s->reg_no.'/c_c/'.$s->char_certis['id'].'/edit')  }}"><i class="fa fa-pencil-square-o faa-pulse animated" aria-hidden="true"></i> Update
		  </a>
		 </div>
	</div>
	@else
    <div class="text-center" style="margin-bottom: 160px; margin-top:160px;">
      <H1>No Record Found. Make Charector Certificate <a href="{{ URL::to('/acadmic/' . $s->reg_no.'/c_c') }}">Make</a></H1>
    </div>
    @endif
</div>

@stop
