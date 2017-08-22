@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

  @include('partial.errors')
   @if(count($stopages))
    <div class="col-md-8" >
      @if(count($transportfees))
      <div class="panel panel-default">
        <div class="panel-heading"><button class="btn btn-primary btn-block">Transport Fee Structure({{  $activesessionid->name}})</button></div>
          <div class="panel-body">
            <div class="table-responsive text-center">
              <table class=" table table-bordered  table-hover" data-form="deleteForm">
                    <thead>
                      <tr>
                        <th class="text-center">Serial No.</th>
                        <th class="text-center">Session</th>
                        <th class="text-center">Stopage Name</th>
                        <th class="text-center">Transport Fee</th>
                        <th class="text-center">Late Fee</th>
                        <th class="text-center">Other Fee</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Update</th>
                        <th class="text-center">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0 ?>
                     @foreach($transportfees as $fee)
                     <?php $i++ ?>
                      <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $fee->asessions['name'] }}</td>
                          <td>{{ $fee->stopages['name'] }}</td>
                          <td>
                          <i class="fa fa-inr" aria-hidden="true"></i> {{ $fee->transport_fee }}
                          </td>

                          <td>
                          <i class="fa fa-inr" aria-hidden="true"></i>
                           @if($fee->late_fee)
                           {{ $fee->late_fee }}
                            @else
                           0
                           @endif
                          </td>
                         

                          <td>
                            <i class="fa fa-inr" aria-hidden="true"></i> 
                            @if($fee->other_fee)
                             {{ $fee->other_fee }}
                            @else
                             0
                             @endif
                          </td>
                           
                          <td>
                            @if($fee->remarks)
                            {{ $fee->remarks }}
                            @else
                            Monthly
                             @endif
                          </td>
                        <td>@include('add.transport_fee.transport_fee_structure__update_modal')</td>
                         <td>@include('add.transport_fee.delete_transport_fee')</td>

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

   <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading"><button class="btn btn-primary btn-block">Transport Fee Form({{  $activesessionid->name}})</button></div>
          <div class="panel-body">
            <form method="post" action="{{ route('transports.store') }}" data-parsley-validate ="" >
              {{ csrf_field() }}

              <div class="form-group">
                <label for="stopage">Select Stopage</label>
                <select class="form-control" id="stopage" name="stopage" required="">
                  <option value="">--Select Stopage</option>
                  @foreach($stopages as $key=>$value)
                   @if (Input::old('stopage') == $key)
                   <option value="{{ $key }}" selected>{{ $value }}</option>
                   @else
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endif
                  @endforeach
                 </select>
              </div>

                <div class="form-group">
                  <label for="transport_fee">Transport Fee (Monthely) </label>
                  <input type="text" class="form-control" id="transport_fee" name="transport_fee" value="{{ old('transport_fee') }}" placeholder="Fee" required="" data-parsley-type="number">
                </div>

                <div class="form-group">
                  <label for="late_fee">Late Fee</label>
                  <input type="text" class="form-control" id="late_fee" name="late_fee" value="{{ old('late_fee') }}" placeholder="Late Fee" data-parsley-type="number">
                </div>

                <div class="form-group">
                  <label for="other_fee">Other Fee</label>
                  <input type="text" class="form-control" id="other_fee" name="other_fee" value="{{ old('other_fee') }}" placeholder="Late Fee" data-parsley-type="number">
                </div>

                <div class="form-group">
                 <label for="remarks">Description</label>
                 <textarea class="form-control" rows="3" name="remarks">{{ old('remarks') }}</textarea>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus faa-flash animated" aria-hidden="true"></i> Add Transport Fee</button>
                </div>
            </form>
          </div>
        </div>    
    </div>
    @else
    <div class="text-center" style="margin-bottom: 160px; margin-top:160px;">
      <H1>No Record Found. Add some Stopage first <a href="{{ route('stopages.create') }}">Add</a></H1>
    </div>
    @endif
 </div>

@stop

@section('script')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.7.0/parsley.min.js" type="text/javascript"></script>

  @include('add.destroy_modal_javascript')


@stop


 