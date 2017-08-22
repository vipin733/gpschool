@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')
 <div class="row">
     @include('partial.errors')
   @include('add.cities.city_nav')
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
	            @foreach($cities as $city)
	             <?php $i++ ?>
	              <tr>
	                  <td>{{ $i }}</td>
	                  <td>{{ $city->name }}</td>
	                  <td>
	                    <a class="btn btn-warning" href="{{ route('cities.edit',$city) }}">
	                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	                    </a>
	                      <!-- {{ Form::model($city, ['method' => 'delete', 'route' => ['cities.destroy',$city->id], 'class' =>'form-inline form-delete','style'=>'display: inline;']) }}
                            {{Form::hidden('id', $city->id)}}
                            <button type="submit" name="delete_modal" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                           {{Form::close()}}

	                    @include('add.destroy_modal') -->

	                  </td>
	              </tr>
	            @endforeach
	            </tbody>

	  </table>
    </div>

    <div class="col-md-4">
  	  <form method="POST" action="{{ route('cities.store') }}" data-parsley-validate ="">
        {{ csrf_field() }}
       <div class="form-group">
        <label class="control-label" for="name">City Name:</label>
          <input type="text" class="form-control" name="name" id="name" required="">
         <button type="submit" class="form-control btn btn-primary btn-lg btn-block"><i class="fa fa-plus faa-flash animated" aria-hidden="true"></i> Add City</button>
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
