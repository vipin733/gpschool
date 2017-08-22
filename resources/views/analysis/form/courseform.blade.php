<div class="col-sm-10 col-sm-offset-1">
      <div class="form-group pull-right">
     {{  Form::open(['method' => 'GET']) }}

       <div class="form-group">
        <select  id="course" name="course" >
          <option value="">---Select Course</option>
         @foreach($courses as $key=>$value)

          <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>

       <button type="submit">Submit</button>
       </div>
     {{ Form::close() }}
    </div>
