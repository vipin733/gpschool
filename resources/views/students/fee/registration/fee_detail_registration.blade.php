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
                  <th class="text-center">View Profile</th>
                  <th class="text-center">Pay Registration Fee</th>
                  <th class="text-center">Pay Tution Fee</th>
                  @if($student->TransportationTaken())
                  <th class="text-center">Pay Transport Fee</th>
                  @else
                  @endif
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                    <td>{{ $student->reg_no}}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{$student->courses['name']}}</td>
                    <td>
                      <a href="/student/{{$student['reg_no']}}" class="btn btn-primary">
                       <i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i>
                      </a>
                    </td>
                     <td>
                      <div class="text-center">
                       <a class="btn btn-success" href="/student/{{$student->reg_no}}/registration_fee/take">
                       <i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                       </a>
                      </div>
                    </td>
                     <td>
                      <div class="text-center">
                       <a class="btn btn-success" href="/student/{{$student->reg_no}}/tution_fee/take">
                       <i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                       </a>
                      </div>
                    </td>
                    @if($student->TransportationTaken())
                    <td>
                      <div class="text-center">
                       <a class="btn btn-success" href="/student/{{$student->reg_no}}/transport_fee/take"><i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                       </a>
                      </div>
                    </td>
                    @else
                    @endif                   
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
	    <button class="btn btn-primary btn-block">Student Last Registraion Fee Transactions</button>
	    </div>
	    <div class="panel-body">
        <div class="table-responsive">
		      <table class=" table table-bordered  table-hover" data-form="deleteForm">
            <thead>
              <tr>
                <th class="text-center">Sr. No.</th>
                <th class="text-center">Date</th>
                <th class="text-center">Session</th>
                <th class="text-center">Course</th>
                <th class="text-center">Total</th>
                <th class="text-center">Remarks</th>
                <th class="text-center">Completed</th>
                 <th class="text-center">View</th>
                <th class="text-center">Print</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
             <?php $i = 0 ?>
             @foreach($registraionfees as $registraionfee)
             <?php $i++ ?>
              <tr class="text-center">
                  <td>{{ $i }}</td>
                  <td>{{ $registraionfee['created_at']->format('d/m/Y') }}</td>
                  <td>{{ $registraionfee->asessions['name'] }}</td>
                  <td>{{ $registraionfee->courses['name'] }}</td>
                   
                  <td>
                    <i class="fa fa-inr" aria-hidden="true"></i> 
                    {{$registraionfee['registraion_fee'] + $registraionfee['late_fee'] }}
                  </td>
                  <td>
                     @if($registraionfee['remarks']) 
                     {{ $registraionfee['remarks'] }}
                     @else
                     Fee Submited
                     @endif
                  </td>
                  <td>
                      @if($registraionfee['completed'] == 0)
                       No
                     @else
                       Yes
                     @endif
                   </td>

                  <td>
                    <a class="btn btn-success btn-xs" href="/student/{{$student->reg_no}}/{{$registraionfee['id']}}/registration/reciept">
                      <i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i>
                    </a>
                   </td> 

                  <td> 
                    <a class="btn btn-primary btn-xs" href="{{ URL::to('/student/' . $registraionfee->id.'/registration/pdf') }}">
                      <i class="fa fa-download faa-vertical animated" aria-hidden="true"></i>
                    </a>
                  </td>
                  
                  <td>  
                    @include('students.fee.registration.delete_registration_fee_modal')
                  </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
       
       {{ $registraionfees->links() }}
    </div>
	</div>
  
</div>

@endsection

@section('script')
  @include('add.destroy_modal_javascript')
@stop