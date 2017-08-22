
@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

    @include('analysis.form.yearform')
   <div class="pull-left"><a class="btn btn-primary" href="/filtergraph/bar/year">Year Wise Graph</a></div>
   <div class="pull-right"><a class="btn btn-default" href="/filtergraph/bar/courses"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Refresh</a></div>
   <div class="pull-left"><a class="btn btn-primary" href="/filtergraph/bar/course/combined">Mix</a></div>
 

 <div class="col-sm-10 col-sm-offset-1">
      <canvas id="Chart10" height="280" width="600"></canvas>
      <br><br>
 </div>

 @stop

@section('script')
  <script  src="/js/Chart.bundle.min.js"></script>

   @include('analysis.bar.single.bar_course')



@stop
