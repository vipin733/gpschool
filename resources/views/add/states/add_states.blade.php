@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')
 <div class="row">
     @include('partial.errors')
   @include('add.states.state_nav')
    <div id="main">
 	  <div class="col-md-6">
 		<table class=" table table-bordered  table-hover" data-form="deleteForm">
	            <thead>

	              <tr>
	                <th>Serial No.</th>
	                <th>Course Name</th>
	                <th>Action</th>
	              </tr>
	            </thead>
	            <tbody>
	            <?php $i = 0 ?>
	            @foreach($states as $state)
	             <?php $i++ ?>
	              <tr>
	                  <td>{{ $i }}</td>
	                  <td>{{ $state->name }}</td>
	                  <td>
	                    <a class="btn btn-warning" href="{{ route('states.edit',$state) }}">
	                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	                    </a>
	                      <!-- {{ Form::model($state, ['method' => 'delete', 'route' => ['states.destroy',$state->id], 'class' =>'form-inline form-delete','style'=>'display: inline;']) }}
                            {{Form::hidden('id', $state->id)}}
                            <button type="submit" name="delete_modal" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                           {{Form::close()}}

	                    @include('add.destroy_modal')
 -->
	                  </td>
	              </tr>
	            @endforeach
	            </tbody>

	   </table>
      </div>
    <div class="col-md-4">
  	   <form method="POST" action="{{ route('states.store') }}" data-parsley-validate ="">
       {{ csrf_field() }}
      <div class="form-group">
        <label class="control-label" for="name">State Name:</label>
          <input type="text" class="form-control" name="name" id="name" required="">
         <button type="submit" class="form-control btn btn-primary btn-lg btn-block"><i class="fa fa-plus faa-flash animated" aria-hidden="true"></i> Add State</button>
      </div>
     </form>
    </div>
   </div>
  @include('partial.errors')
</div>



@stop
@section('script')
  <script src="/js/parsley.min.js" type="text/javascript"></script>
  @include('add.destroy_modal_javascript')
  @stop
