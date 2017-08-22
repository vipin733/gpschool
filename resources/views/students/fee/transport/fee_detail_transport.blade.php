@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
      <button class="btn btn-primary btn-block">Student Information</button>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class=" table table-bordered  table-hover">
            <thead>
                <tr>
                  <th class="text-center">Reg. No.</th>
                  <th class="text-center">Student Name</th>
                  <th class="text-center">Father Name</th>
                  <th class="text-center">Course Name</th>
                  @if($student->TransportationTaken())
                  <th class="text-center">Pay Transport Fee</th>
                  @else
                  @endif
                  <th class="text-center">Pay Tution Fee</th>
                 <th class="text-center">Pay Registration Fee</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>{{ $student->reg_no}}</td>
                    <td><a  href="/student/{{$student->reg_no}}">{{ $student->student_name }}</a></td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{$student->courses['name']}}</td>
                    @if($student->TransportationTaken())
                    <td>
                      <div class="text-center">
                       <a class="btn btn-success" href="/student/{{$student->reg_no}}/transport_fee/take"><i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                       </a>
                      </div>
                    </td>
                    @else
                    @endif
                    <td>
                      <div class="text-center">
                       <a class="btn btn-success" href="/student/{{$student->reg_no}}/tution_fee/take">
                       <i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                       </a>
                      </div>
                    </td>
                   <td>
                      <div class="text-center">
                       <a class="btn btn-success" href="/student/{{$student->reg_no}}/registration_fee/take">
                       <i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                       </a>
                    </div>
                   </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>    
    </div>
  </div>  

	<div class="col-sm-12 col-md-12">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <button class="btn btn-primary btn-block">Student Last Transport Fee Transactions</button>
	    </div>
	  <div class="panel-body">
      <div class="table-responsive">
		    <table class=" table table-bordered  table-hover" data-form="deleteForm">
            <thead>
              <tr>
                <th class="text-center">Sr. No.</th>
                <th class="text-center">Date</th>
                <th class="text-center">Session</th>
                <th class="text-center">Month</th>
                <th class="text-center">Course</th>
                <th class="text-center">Total</th>
                <th class="text-center">Remarks</th>
                <th class="text-center">Completed</th>
                <th class="text-center">View</th>
                <th class="text-center">Print</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody class="text-center">
             <?php $i = 0 ?>
             @foreach($transportfees as $transportfee)
             <?php $i++ ?>
              <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $transportfee['created_at']->format('d/m/Y') }}</td>
                  <td>{{ $transportfee->asessions['name'] }}</td>
                  <td>{{ $transportfee['month']->format('F') }}</td>
                  <td>{{ $transportfee->courses['name'] }}</td>
                  <td>
                    <i class="fa fa-inr" aria-hidden="true"></i> 
                    {{$transportfee['transport_fee'] + $transportfee['late_fee'] + $transportfee['other_fee']}}
                  </td>
                 <td>
                   @if($transportfee['remarks']) 
                     {{ $transportfee['remarks'] }}
                     @else
                     Fee Submited
                    @endif
                 </td>
                  <td>
                      @if($transportfee['completed'] == 0)
                       No
                     @else
                       Yes
                     @endif
                   </td>

                  <td>
                    <a class="btn btn-success btn-xs" href="/student/{{$student->reg_no}}/{{$transportfee->id}}/transport/reciept">
                      <i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i>
                    </a>
                   </td>
                   
                   <td>
                    <a class="btn btn-primary btn-xs" href="{{ URL::to('/student/' . $transportfee->id.'/transport/pdf') }}">
                      <i class="fa fa-download faa-vertical animated" aria-hidden="true"></i>
                    </a>
                    </td>

                   <td> 
                    @include('students.fee.transport.delete_transport_fee_modal')
                  </td>

              </tr>
             @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
  {{ $transportfees->links() }}
	</div>
  
</div>

@endsection

@section('script')
  @include('add.destroy_modal_javascript')
@stop