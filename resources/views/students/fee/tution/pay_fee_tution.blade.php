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
        <div class="table-responsive text-center">
          <table class=" table table-bordered  table-hover">
            <thead>
              <tr>
                <th class="text-center">Reg. No.</th>
                <th class="text-center">Student Name</th>
                <th class="text-center">Father Name</th>
                <th class="text-center">Mother Name</th>
                <th class="text-center">Course Name</th>
                <th class="text-center">Last Transaction</th>
                @if($student->transportation == 1)
                <th class="text-center">Pay Trans. Fee</th>
                @else
                 @if(count($student->transportations))
                  <th class="text-center">Last Trans. Transaction</th>
                 @else
                 @endif
                @endif
                <th class="text-center">Pay Registration Fee</th> 
                <th class="text-center">Fee Structure</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                  <td>{{ $student->reg_no }}</td>
                  <td><a href="{{ URL::to('/student/' . $student->reg_no) }}">{{ $student->student_name }}</a></td><td>{{ $student->father_name }}</td>
                  <td>{{ $student->mother_name }}</td>
                  <td>{{ $student->courses['name'] }}</td>
                  <td>
                    <div class="text-center">
                     <a class="btn btn-success" href="{{ URL::to('/student/' . $student->reg_no.'/tution_fee/details') }}"><i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                     </a>
                    </div>
                  </td>
               @if($student->transportation == 1)
                  <td>
                    <div class="text-center">
                     <a class="btn btn-warning" href="{{ URL::to('/student/' . $student->reg_no.'/transport_fee/take') }}"><i class="fa fa-credit-card-alt faa-horizontal animated" aria-hidden="true"></i>
                     </a>
                    </div>
                  </td>
                @else
                @if(count($student->transportations))
                  <td>
                    <div class="text-center">
                     <a class="btn btn-warning" href="{{ URL::to('/student/' . $student->reg_no.'/transport_fee/details') }}"><i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                     </a>
                    </div>
                  </td>
                 @else
                 @endif
                @endif
                <td>
                    <div class="text-center">
                       <a class="btn btn-success" href="/student/{{$student->reg_no}}/registration_fee/take">
                       <i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                       </a>
                      </div>
                  </td>
                  <td>
                  <div class="text-center">
                    @include('students.fee.tution.tution_fee_structure_modal')
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
          Last 12 Transactions 
        </button>
      </div>
      <div class="panel-body">
        <div class="table-responsive text-center">
          <table class=" table table-bordered  table-hover" data-form="deleteForm">
             <thead>
               <tr>
                 <th class="text-center">Submitted Date</th>
                 <th class="text-center">Session</th>
                 <th class="text-center">Month</th>
                 <th class="text-center">Amount</th>
                 <th class="text-center">Remarks</th>
                 <th class="text-center">Completed</th>
                 <th class="text-center">View</th>
                 <th class="text-center">Print</th>
                 <th class="text-center">Delete</th>
               </tr>
             </thead>

             <tbody class="text-center">
               @foreach($tutions_transactions as $tutionfee)
                  <tr>
                   <td>{{ $tutionfee['created_at']->format('d/m/Y') }}</td>
                    <td>{{ $tutionfee->asessions['name']}}</td>
                   <td>{{ $tutionfee['month']->format('F') }}</td>
                    <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $tutionfee->other_fee + $tutionfee->late_fee + $tutionfee->tution_fee}}</td>
                   <td>
                     @if($tutionfee['remarks'])
                     {{ $tutionfee['remarks'] }}
                     @else
                      Fee Submited
                     @endif
                   </td>
                   <td>
                      @if($tutionfee['completed'] == 0)
                       No
                     @else
                       Yes
                     @endif
                   </td>
                   <td>
                      <a class="btn btn-success btn-xs" href="/student/{{$student->reg_no}}/{{$tutionfee['id']}}/tution/reciept">
                       <i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i>
                     </a>
                    </td>
                    <td> 
                     <a class="btn btn-primary btn-xs" href="{{ URL::to('/student/'.$tutionfee->id.'/tution/pdf') }}">
                       <i class="fa fa-download faa-vertical animated" aria-hidden="true"></i>
                     </a>
                   </td>
                   <td>
                     @include('students.fee.tution.delete_tution_fee_modal')
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
    <div class="panel panel-default">
     <div class="panel-heading text-center">
        <button class="btn btn-primary btn-block">
          Tution Fee Form
        </button>
     </div>
     <div class="panel-body">
       <form method="post" action="/student/{{$student->reg_no}}/tution_fee/take" data-parsley-validate ="">
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
           <label for="course_id">Select Month:</label>
         <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          {{ Form::selectMonth('month',  null, ['placeholder' => '---Select Month','class' => 'form-control','required'=> ' "" '  ]) }}
          </div>
       </div>

       <div class="form-group">
         <label class="control-label" for="tution_fee">Tution Fee:</label>
          <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
           <input type="text" class="form-control" value="{{ old('tution_fee',$student->courses->tutionfee['tution_fee']) }}" name="tution_fee" id="tution_fee" required="" data-parsley-type="number">
          </div>
       </div>

       <div class="form-group">
         <label class="control-label" for="late_fee">Late Fee:</label>
          <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
           <input type="text" class="form-control" name="late_fee" value="{{ old('late_fee',$student->courses->tutionfee['late_fee']) }}" id="late_fee" data-parsley-type="number">
          </div>
       </div>

       <div class="form-group">
         <label class="control-label" for="other_fee">Other Fee:</label>
          <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-inr" aria-hidden="true"></i></span>
           <input type="text" class="form-control" id="other_fee" value="{{ old('other_fee',$student->courses->tutionfee['other_fee']) }}" name="other_fee" data-parsley-type="number">
          </div>
       </div>

       <div class="form-group">
         <label class="control-label" for="remarks">Remarks:</label>
           <textarea name="remarks" class="form-control"  rows="3">{{ Input::old('remarks') }}{{$student->courses->tutionfee['remarks']}}</textarea>
       </div>

       <div class="form-group">
           <label class="control-label" for="completed">Is tution fee completed for this session?:</label>
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
