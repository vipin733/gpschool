@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Student Till Now</div>
                <div class="panel-body">
                   <h1 class="text-center">{{$students}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Active Student</div>
                <div class="panel-body">
                   <h1 class="text-center">{{$active_students}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Teacher Till Now</div>
                <div class="panel-body">
                   <h1 class="text-center">{{$teachers}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Active Teacher</div>
                <div class="panel-body">
                   <h1 class="text-center">{{$active_teachers}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Staff Till Now</div>
                <div class="panel-body">
                   <h1 class="text-center">{{$staffs}}</h1>
                </div>
            </div>
        </div>

        
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Staff Till Now</div>
                <div class="panel-body">
                   <h1 class="text-center">{{$active_staffs}}</h1>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Tution Fee Collection @if($activesession)({{$activesession->name}}) @endif</div>
                <div class="panel-body">
                   <h1 class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> {{$total_tution_fee}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Registartion Fee Collection @if($activesession)({{$activesession->name}})@endif</div>
                <div class="panel-body">
                   <h1 class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> {{$total_registration_fee}}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Total Transport Fee Collection @if($activesession)({{$activesession->name}})@endif</div>
                <div class="panel-body">
                   <h1 class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> {{$total_transport_fee}}</h1>
                </div>
            </div>
        </div>
     

       

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Compairing Students with previous Year students</div>
                <div class="panel-body" >
                   <canvas id="Compairing_student_line" height="400" width="600"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Compairing fee Collection with previous Year(in <i class="fa fa-inr" aria-hidden="true"></i> 1000).</div>
                <div class="panel-body">
                   <canvas id="Compairing_fee_line" height="400" width="600"></canvas>
                </div>
            </div>
        </div>
   
    </div>
 <br><br>
@endsection

@section('script')
<script src="/js/Chart.bundle.min.js"></script>
<script type="text/javascript" src="/js/utils.js"></script>
@include('home.Compairing_student_bar')
@include('home.Compairing_fee_bar')
@stop
