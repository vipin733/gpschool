<!DOCTYPE html>
<html>
<head>

    <title>Printing</title>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
   <style type="text/css">
   	.paddingbox{
    border: solid; padding: 5px;
    }

   .c-c{
 line-height: 200%;
 text-align: justify;
 text-justify: inter-word;

} 

.heade_cc{
  background-color: black;
    color: white;
    padding: 10px;
}

.dotted{
   border-bottom: 2px dashed #322f32;
}

body {
   
    font-family: sans-serif;
}
   </style>
</head>
<body>
<div class="row" style="margin-top: 50px;">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-body" style="border-style: double; border-width: 20px;">
		  <div class="text-center">
		  	 <h2><b> Narayani Challenger Convent School</b></h2>
		      <h4>Gangapur (Mangari), Varanasi, U.P.-221202</h4>
		      <h3><strong class="heade_cc">Character Certificate</strong></h3>
		  </div>
		  <div class="col-sm-12">
		  	<div class="pull-right">
		  	<h3 class="paddingbox">Serial No. <strong>{{  $c['id']  }}</strong></h3>
		  	</div>
		  	<div class="pull-left">
		  	<h3 class="paddingbox">Reg No. <strong>{{  $c->students['reg_no'] }}</strong></h3>
		  </div>
		  </div>
		   		 
			 <div class="col-sm-6 col-sm-offset-3">
                <br><br><br>
			 	<h3 class="c-c">
			 
			     This is certified that <strong class="dotted">{{ $c->students->student_name }}</strong> @if($c->students->gender == 1) D/o @else S/o @endif <strong class="dotted">Mr. {{ $c->students->father_name }}</strong> is successfully completed @if($c->students->gender == 1) her @else his @endif studies from class <strong class="dotted">{{ $c->students->created_courses['name'] }}</strong> to <strong class="dotted">{{$c->students->courses['name']}}</strong> from our school as a bright student. @if($c->students->gender == 1) She @else He @endif successfully completed  @if($c->students->gender == 1) her @else his @endif high school in the year of <strong class="dotted">{{ $c['year_10'] }}</strong> with <strong class="dotted">{{$c['grade_10']}}</strong> division

			    @if($c[('year_12')])

			    and completed  @if($c->students->gender == 1) her @else his @endif intermediate in the year <strong class="dotted">{{$c['year_12']}}</strong> with <strong class="dotted">{{$c['grade_12']}}</strong> division.
			    @else.
			    @endif
			    During schooling  @if($c->students->gender == 1) her @else his @endif charactor  was very good and deciplind behavior.
			   In school student record @if($c->students->gender == 1) her @else his @endif date of birth <strong class="dotted">{{$c->students->date_of_birth->format('d/m/Y')}}</strong>  (in words)  <strong class="dotted">{{$pday}} {{ $month }}, {{ $pyear }}</strong>.
			    <h3 style="margin-left: 10px;">We wish @if($c->students->gender == 1) her @else him @endif a very bright and successful future.</h3>
			   </h3>
			 </div>
			 <div><br><br><br><br>
			 	<div class="pull-left"><h3>Date <strong class="dotted">{{ Carbon\Carbon::today()->format('d/m/Y')}}</strong></h3></div>
			 	<div style="margin-left: 70%;"><h3><strong>Principal</strong></h3></div>
			 </div>		   
		  </div>
		</div>
	</div>
</div>

</body>
</html>
  