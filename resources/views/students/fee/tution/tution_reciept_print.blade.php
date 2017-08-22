<!DOCTYPE html>
<html>
<head>

    <title>Printing</title>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('/css/font-awesome.min.css')}}">
</head>
<style type="text/css">
  body {
   
    font-family: sans-serif;
}

</style>
<body>

  <div class="row">
    <div class=" col-xs-12 col-sm-12 col-md-10  col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-body">
         <div class="row">

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="text-center">
                    <img src="{{ URL::to('/image/logo.png') }}" alt="Gramyanchal" width="100" height="100">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="text-center">
                    <h4><strong>Narayani Challenger Convent School</strong></h4>
                    <h5>Gangapur (Mangari), Varanasi, U.P.-221202</h5>
                    <h5 style=""><strong>Tution Fee Receipt({{$tutionfee->asessions['name']}})</strong></h5>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="pull-left">
                    <h5>Date: {{Carbon\Carbon::today()->format('d/m/Y')}}</h5>
                </div>
            </div>

         </div><br>

        <div class="row">
         <div class="col-xs-6 col-sm-6 col-md-6">
          <table class=" table table-bordered  table-hover">
            <thead>
               <tr>
                <th>
                  Student ID
                </th>
                <td>
                  {{ $tutionfee->students->reg_no }}
                </td>
                </tr>
                <tr>
                  <th>
                  Student Name
                </th>
                <td>
                  {{ $tutionfee->students->student_name }}
                </td>
                </tr>
                <tr>
                  <th>
                  Father Name
                </th>
                <td>
                  {{ $tutionfee->students->father_name }}
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
         <div class="col-xs-6 col-sm-6 col-md-6">
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
       <div class="row">
          <div class="col-xs-8 col-sm-8 col-md-8">
          <br>
            <h5 class="pull-left">By: <strong>{{ $tutionfee->takers['name'] }}</strong></h5>
            <h5 class="pull-right"><strong>Signature</strong></h5>
          </div>
       </div>
       

    </div>
  </div>
</div>

</body>
</html>
