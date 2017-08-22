@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')


 @include('analysis.form.courseform')
 <div class="pull-left"><a class="btn btn-primary" href="/filtergraph/polar/courses">Course Wise Graph</a></div>
 <div class="pull-right"><a class="btn btn-default" href="/filtergraph/polar/year"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Refresh</a></div>
 </div>
<div class="col-sm-10 col-sm-offset-1">
      <canvas id="Chart3" height="280" width="600"></canvas>
 </div>


@stop

@section('script')
  <script  src="/js/Chart.bundle.min.js"></script>
  @include('analysis.polar.single.polar_year')

@stop
