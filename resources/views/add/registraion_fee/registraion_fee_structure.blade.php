@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

 <div class="row">

   @if(count($courses))
    <div class="col-md-12">
      @if(count($registraionfees))
      <div class="panel panel-default">
        <div class="panel-heading"><button class="btn btn-primary btn-block">Registraion Fee Structure({{  $activesessionid->name}})</button></div>
          <div class="panel-body">
            <div class="table-responsive text-center">
              <table class=" table table-bordered  table-hover" data-form="deleteForm">
                  <thead>
                    <tr>
                      <th class="text-center">Serial No.</th>
                      <th class="text-center">Session</th>
                      <th class="text-center">Course Name</th>
                      <th class="text-center">Registraion Fee</th>
                      <th class="text-center">Late Fee</th>
                      <th class="text-center">Fee Details</th>
                      <th class="text-center">Remarks</th>
                      <th class="text-center">Update</th>
                      <th class="text-center">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 0 ?>
                   @foreach($registraionfees as $fee)
                   <?php $i++ ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $fee->asessions['name'] }}</td>
                        <td>{{ $fee->courses['name'] }}</td>
                        <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $fee->registraion_fee }}</td> @if($fee->late_fee)
                        <td>
                         <i class="fa fa-inr" aria-hidden="true"></i> {{ $fee->late_fee }}
                        </td>
                        @else
                        <td>
                         <i class="fa fa-inr" aria-hidden="true"></i> 0
                        </td>
                        @endif
                        <td>
                         {{ $fee->fee_details }}
                        </td>
                       @if($fee->remarks)
                        <td>{{ $fee->remarks }}</td>
                       @else
                         <td>N/A</td>
                       @endif                     
                      <td>@include('add.registraion_fee.registraion_fee_structure__update_modal')</td>
                      <td>@include('add.registraion_fee.delete_registraion_fee')</td>
                    </tr>
                   @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
        @else
        <div class="text-center" style="margin-bottom: 160px; margin-top:160px;">
          <H1>No Fee Record Found</H1>
        </div>
        @endif

    </div>

   <div class="col-md-6 col-xs-10 col-xs-offset-1 col-md-offset-3">
      @include('partial.errors')
       <div class="panel panel-default">
        <div class="panel-heading"><button class="btn btn-primary btn-block">Registraion Fee Form({{  $activesessionid->name}})</button></div>
          <div class="panel-body">
            <form method="post" action="{{ route('registrations.store') }}" data-parsley-validate ="">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="course">Select Course</label>
                <select class="form-control" id="course" name="course" required="">
                  <option value="">--Select Course</option>
                  @foreach($courses as $key=>$value)
                   @if (Input::old('course') == $key)
                   <option value="{{ $key }}" selected>{{ $value }}</option>
                   @else
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endif
                  @endforeach
              </select>
                </div>

                <div class="form-group">
                  <label for="registraion_fee">Registraion Fee</label>
                  <input type="text" class="form-control" id="registraion_fee" name="registraion_fee" value="{{ old('registraion_fee') }}" placeholder="Fee" required="" data-parsley-type="number">
                </div>

                <div class="form-group">
                  <label for="late_fee">Late Fee</label>
                  <input type="text" class="form-control" id="late_fee" name="late_fee" value="{{ old('late_fee') }}" placeholder="Late Fee" data-parsley-type="number">
                </div>

                <div class="form-group">
                 <label for="fee_details">Fee Details</label>
                 <textarea class="form-control" rows="3" name="fee_details" required="">{{ old('fee_details') }}</textarea>
                </div>

                <div class="form-group">
                 <label for="remarks">Remarks</label>
                 <textarea class="form-control" rows="3" name="remarks" >{{ old('remarks') }}</textarea>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus faa-flash animated" aria-hidden="true"></i> Add Registration Fee</button>
                </div>
              </form>
            </div>
          </div>
    </div>
    @else
    <div class="text-center" style="margin-bottom: 160px; margin-top:160px;">
      <H1>No Record Found. Add some course first <a href="/acadmic/courses/create">Add</a></H1>
    </div>
    @endif
 </div>

@stop

@section('script')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.7.0/parsley.min.js" type="text/javascript"></script>

  @include('add.destroy_modal_javascript')

@stop
 