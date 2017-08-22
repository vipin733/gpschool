@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')
 <div class="row">
     @include('partial.errors')
   @include('add.states.state_nav')
   <div id="main">
    <div class="col-md-4 col-md-offset-3">
  	 <form method="POST" action="{{ route('states.update',$state->id) }}" data-parsley-validate ="">
     {{ csrf_field() }} {{ method_field('PATCH') }}
      <div class="form-group">
        <label class="control-label" for="name">State Name:</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ $state->name }}" required="">
         <button type="submit" class="form-control btn btn-primary btn-lg btn-block"><i class="fa fa-wrench faa-wrench animated" aria-hidden="true"></i> Submit</button>
         <a class="btn btn-warning btn-lg btn-block" href="{{ route('states.create') }}"><i class="fa fa-backward faa-passing-reverse animated" aria-hidden="true"></i> Back</a>
      </div>
    </form>
    </div>
  </div>

</div>
@stop

@section('script')
  <script src="/js/parsley.min.js" type="text/javascript"></script>
  @include('add.destroy_modal_javascript')

@stop
