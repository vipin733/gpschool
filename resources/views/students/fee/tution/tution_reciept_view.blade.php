@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

 <div class="row"  style="margin-top: 20px;, border: 1px;">
   <div class="col-md-10  col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-body">
         <div class="row">

            <div class="col-md-2">
                <div class="text-center">
                    <img src="{{ URL::to('/image/logo.png') }}" alt="Gramyanchal" width="100" height="100">
                </div>
            </div>

            <div class="col-md-8">
                <div class="text-center">
                    <h4><strong>Narayani Challenger Convent School</strong></h4>
                    <h5>Gangapur (Mangari), Varanasi, U.P.-221202</h5>
                    <h5 style=""><strong>Tution Fee Receipt({{$tutionfee->asessions['name']}})</strong></h5>
                </div>
            </div>

            <div class="col-md-2">
                <div class="pull-left">
                    <h5>Date: {{Carbon\Carbon::today()->format('d/m/Y')}}</h5></h5>
                </div>
            </div>

         </div><br>

        <div class="row">
         <div class="col-md-6">
          <div class="table-responsive">
          <table class=" table table-bordered  table-hover">
            <thead>
              <tr>
                <th>
                  Student ID
                </th>
                <td>
                  {{ $student->reg_no }}
                </td>
                </tr>
                <tr>
                  <th>
                  Student Name
                </th>
                <td>
                  {{ $student->student_name }}
                </td>
                </tr>
                <tr>
                  <th>
                  Father Name
                </th>
                <td>
                  {{ $student->father_name }}
                </td>
                </tr>
                <tr>
                  <th>
                  Course Name
                </th>
                <td>
                  {{ $tutionfee->courses['name'] }}
                </td>
                </tr>
                <tr>
                <th>
                 Receipt No.
                </th>
                <td>
                  {{ $tutionfee['created_at']->format('Y') }}/{{ $tutionfee->reciept_no }}
                </td>
                </tr>
                <tr>
                  <th>
                  Month
                </th>
                <td>
                  {{ $tutionfee['month']->format('F') }}
                </td>
                </tr>
                <tr>
                  <th>
                  Fee Submitted Date
                </th>
                <td>
                  {{ $tutionfee['created_at']->format('d/m/Y') }}
                </td>
                </tr>
            </thead>

          </table>
        </div>
        </div>
         <div class="col-md-6">
         <div class="table-responsive">
          <table class=" table table-bordered  table-hover">
            <thead>
              <tr>
                <th>
                 <div class="text-center">
                   Fees Type
                 </div>
                </th>
                <th>
                  <div class="text-center">
                   Fees
                  </div>
                </th>
                <th>
                  <div class="text-center">
                   Remarks
                  </div>
                </th>
              </tr>
            </thead>
            <tbody>
                  <tr>
                      <td>
                        <div class="text-center">
                          Tution Fees
                        </div>
                        </td>
                      <td>
                          <div class="text-center">
                              <i class="fa fa-inr" aria-hidden="true"></i> {{$tutionfee->tution_fee}}
                          </div>
                      </td>
                      <td rowspan="5">
                        <div class="text-center">
                        @if($tutionfee->remarks)
                           {{$tutionfee->remarks}}
                         @else
                         Fee Submitted
                         @endif
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td>
                        <div class="text-center">
                          Late Fees
                        </div>
                      </td>
                       <td>
                           <div class="text-center">
                             @if($tutionfee->late_fee)
                              <i class="fa fa-inr" aria-hidden="true"></i> {{$tutionfee->late_fee}}
                            @else
                              <i class="fa fa-inr" aria-hidden="true"></i> 0
                            @endif
                          </div>
                       </td>
                  </tr>
                  <tr>
                      <td>
                       <div class="text-center">
                         Other Fees
                        </div>
                      </td>
                       <td>
                         <div class="text-center">
                            @if($tutionfee->other_fee)
                              <i class="fa fa-inr" aria-hidden="true"></i> {{$tutionfee->other_fee}}
                            @else
                              <i class="fa fa-inr" aria-hidden="true"></i> 0
                            @endif
                          </div>
                       </td>
                  </tr>
                  <tr>
                      <td>
                       <div class="pull-right">
                         <strong>Total</strong>
                        </div>
                      </td>
                       <td>
                          <div class="text-center">
                              <strong><i class="fa fa-inr" aria-hidden="true"></i> {{$total}}</strong>
                          </div>
                       </td>
                  </tr>

            </tbody>
          </table>
          </div>
         </div>

        </div>


       <div class="row">
          <div class="col-md-8">
            <h5>By: <strong>{{ $tutionfee->takers['name'] }}</strong></h5>
          </div>

       </div>
   </div>
  </div>
  <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
         <a href="{{ URL::to('/student/' . $tutionfee->students->reg_no.'/tution_fee/details') }}" class="btn btn-warning"><i class="fa fa-backward faa-passing-reverse animated" aria-hidden="true"></i> Back</a>
         <a href="{{ URL::to('/student/'.$tutionfee->id.'/tution/pdf') }}" class="btn btn-primary"><i class="fa fa-print faa-pulse animated" aria-hidden="true"></i> Print</a>
  </div>
 </div>
</div>


@stop
