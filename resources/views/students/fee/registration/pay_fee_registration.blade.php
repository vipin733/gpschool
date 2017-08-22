@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

<div class="row">
  <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-primary btn-block">
          Student Information
        </button>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered  table-hover">
            <thead>
              <tr>
                <th class="text-center">Reg. No.</th>
                <th class="text-center">Student Name</th>
                <th class="text-center">Father Name</th>
                <th class="text-center">Course Name</th>
                <th class="text-center">Last Transaction</th>
                <th class="text-center">Pay Tution Fee</th>
                @if($student->TransportationTaken())
                <th class="text-center">Pay Transport Fee</th>
                @endif
                <th class="text-center">Fee Structure</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                  <td>{{$student->reg_no}}</td>
                  <td><a href="/student/{{$student->reg_no}}">{{ $student->student_name }}</a></td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{$student->courses['name']}}</td>

                  <td>
                    <div class="text-center">
                     <a class="btn btn-success" href="/student/{{$student->reg_no}}/registration_fee/details"><i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                     </a>
                    </div>
                  </td>

                  <td>
                    <div class="text-center">
                     <a class="btn btn-success" href="/student/{{$student->reg_no}}/tution_fee/take"><i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
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
                  @endif

                  <td>
                  <div class="text-center">
                    @include('students.fee.registration.registraion_fee_structure_modal')
                  </div>
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-primary btn-block">
         Registraion Fee
        </button>
      </div>
      <div class="panel-body">
        <div class="table-responsive text-center">
          <table class=" table table-bordered  table-hover" data-form="deleteForm">
             <thead>
               <tr>
                 <th class="text-center">Submitted Date</th>
                 <th class="text-center">Session</th>
                 <th class="text-center">Amount</th>
                 <th class="text-center">Remarks</th>
                 <th class="text-center">Completed</th>
                 <th class="text-center">View</th>
                 <th class="text-center">Print</th>
                 <th class="text-center">Delete</th>
               </tr>
             </thead>

             <tbody class="text-center">
               @foreach($registraion_transactions as $registraionfee)
                  <tr>
                   <td>{{ $registraionfee['created_at']->format('d/m/Y') }}</td>
                    <td>{{ $registraionfee->asessions['name']}}</td>
                    <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $registraionfee['registraion_fee'] + $registraionfee['late_fee'] }}</td>
                   <td>
                     @if($registraionfee['remarks'])
                     {{ $registraionfee['remarks'] }}
                     @else
                       Registraion Fee Submited
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
    </div>
  </div>

  <div class="col-md-4">
  @include('partial.errors')
    <div class="panel panel-default">
     <div class="panel-heading text-center">
        <button class="btn btn-primary btn-block">
           Registraion Fee Form
        </button>
     </div>
     <div class="panel-body">
       <form method="post" action="/student/{{$student->reg_no}}/registration_fee/take" data-parsley-validate ="">
       {{ csrf_field() }}

       <div class="form-group">
         <label for="course_id">Student Course:</label>
         <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
           <select class="form-control" id="course" name="course" required="">
             <option value="{{ $student->course_id }}">{{ $student->courses['name'] }}</option>
           </select>
         </div>
       </div>

       <div class="form-group">
         <label class="control-label" for="registraion_fee">Registraion Fee:</label>
          <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
           <input type="text" class="form-control" value="{{ old('registraion_fee',$student->courses->registraionfee['registraion_fee']) }}" name="registraion_fee" id="registraion_fee" required="" data-parsley-type="number">
          </div>
       </div>

       <div class="form-group">
         <label class="control-label" for="late_fee">Late Fee:</label>
          <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
           <input type="text" class="form-control" name="late_fee" value="{{ old('late_fee',$student->courses->registraionfee['late_fee']) }}" id="late_fee" data-parsley-type="number">
          </div>
       </div>

       <div class="form-group">
         <label class="control-label" for="fee_details">Fee Details:</label>
           <textarea name="fee_details" class="form-control"  rows="3">{{ Input::old('fee_details') }}{{$student->courses->registraionfee['fee_details']}}</textarea>
       </div>

       <div class="form-group">
         <label class="control-label" for="fee_details">Remarks:</label>
           <textarea name="remarks" class="form-control"  rows="3">{{ Input::old('remarks') }}{{$student->courses->registraionfee['remarks']}}</textarea>
       </div>

        <div class="form-group">
           <label class="control-label" for="completed">Is resistration fee completed for this session?:</label>
           <select class="form-control" id="completed" name="completed" required="">
             <option value="">--Select</option>
             <option value="0">No</option>
             <option value="1">Yes</option>
           </select>
         </div>

       <div class="col-sm-6 col-sm-offset-3">
         <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus faa-pulse animated" aria-hidden="true"></i> Submit</button>
         </div>
       </div>
     </form>
     </div>
   </div>
  </div>
</div>

@stop
@section('script')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.7.0/parsley.min.js" type="text/javascript"></script>
     @include('add.destroy_modal_javascript')
@stop
