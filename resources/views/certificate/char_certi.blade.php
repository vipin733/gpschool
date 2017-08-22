@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')
  @include('certificate.partial_certi.heading_certi')
  <div class="row">
  	<div class="col-md-8 col-md-offset-2">
  	<h2 style="text-align: center;"><strong>Make Charector Cerificate</strong></h2><br>
  		<form action="/acadmic/{{ $s->id }}/c_c" method="post" data-parsley-validate ="" class="form-inline" style="text-align: center;">
  		{{ csrf_field() }}
  		
          <h2 style="text-align: center;"><strong>X Record</strong></h2>
  		     <div class="form-group">
			    <label for="year_10">X Passing Year</label>
			    <input type="text" class="form-control" name="year_10" id="year_10" placeholder="ex-2010" required="" data-parsley-pattern="[0-9]{4}">
			  </div>
			  <div class="form-group">
			    <label for="grade_10">X Grade</label>
			    <input type="text" class="form-control" name="grade_10" id="grade_10" placeholder="ex-Second" required="">
			   </div>
  		 	
  		
           <h2 style="text-align: center;"><strong>XII Record</strong></h2>
  		     <div class="form-group">
			    <label for="year_12">XII Passing Year</label>
			    <input type="text" name="year_12" class="form-control" id="year_12" placeholder="ex-2012" data-parsley-pattern="[0-9]{4}">
			  </div>
			  <div class="form-group">
			    <label for="grade_12">XII Grade</label>
			    <input type="text" name="grade_12" class="form-control" id="grade_12" placeholder="ex-First">
			 </div>
  		 	
  		
       
  		 <div class="col-sm-4 col-sm-offset-4">
  		 <br>
  		 	<button class="btn btn-success btn-lg btn-block">Submite</button>
  		 </div>

		</form>
  	</div>
  </div>
@stop

@section('script')
  <script src="/js/parsley.min.js" type="text/javascript"></script>
@stop