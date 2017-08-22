@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')


  @include('javascript.counterdiv')
    <div class="row">
     <div class="col-sm-10 col-sm-offset-1">
     <br>
    	 <ul class="nav nav-tabs">
         <li><a href="/analysis/bar"><i class="fa fa-bar-chart  faa-pulse animated" aria-hidden="true"></i> Bar Chart</a></li>
        <li><a href="/analysis/line"><i class="fa fa-line-chart  faa-pulse animated" aria-hidden="true"></i> Line Chart</a></li>
        <li><a href="/analysis/radar"><i class="fa fa-pie-chart  faa-pulse animated" aria-hidden="true"></i> Radar Chart</a></li>
        <li class="active"><a href="/analysis/polar"><i class="fa fa-area-chart  faa-pulse animated" aria-hidden="true"></i> Polar Area Chart</a></li>
        <li><a href="/analysis/pie"> <i class="fa fa-pie-chart  faa-pulse animated" aria-hidden="true"></i> Pie Chart</a></li>
        <li><a href="/analysis/doughnut"><i class="fa fa-pie-chart  faa-pulse animated" aria-hidden="true"></i> Doughnut Chart</a></li>
      </ul>
      <a class="btn btn-success" href="/filtergraph/polar/courses"><i class="fa fa-filter faa-float animated" aria-hidden="true"></i> Filter</a>
     </div>



      @include('javascript.polararea.view_polararea')


     </div>





  @stop

  @section('script')
  <script  src="/js/Chart.bundle.min.js"></script>


   @include('javascript.polararea.script_polararea')

  @include('javascript.counter')

@stop
