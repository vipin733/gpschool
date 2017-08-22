
      <fieldset readonly>
        <div class="form-group">
          <label for="reg_no">Registration No.</label>
          <input type="text"  name="reg_no" class="form-control" value="{{$regno}}" readonly>
        </div>
      </fieldset>

      <div class="form-group">
        <label for="student_name">Students Name</label>
        <input type="text" class="form-control" id="student_name" value="{{ old('student_name') }}" name="student_name" placeholder="Name" required="">
      </div>

      <div class="form-group">
        <label for="course">Admission Course</label>
        <select class="form-control" id="created_course" name="created_course" required="">
          <option value="">---Select Class</option>
         @foreach($courses as $key=>$value)
           @if (Input::old('created_course') == $key)
           <option value="{{ $key }}" selected>{{ $value }}</option>
           @else
          <option value="{{ $key }}">{{ $value }}</option>
          @endif
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="course">Current Course</label>
        <select class="form-control" id="course" name="course" required="">
          <option value="">---Select Class</option>
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
          <label for="course">Admission Session</label>
          <select class="form-control" id="asession" name="asession" required="">
             <option value="">---Select Session</option>
           @foreach($asessions as $key=>$value)
             @if (Input::old('asession') == $key)
             <option value="{{ $key }}" selected>{{ $value }}</option>
             @else
            <option value="{{ $key }}">{{ $value }}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="form-group">
            <label for="date_of_admission">Date Of Addmission(dd/mm/yyyy)</label>
            <input type="text" class="form-control" id="date_pic" name="date_of_admission" placeholder="ex-22/06/2015" value="{{old('date_of_admission',Carbon\Carbon::today()->format('d/m/Y'))}}" required="">
        </div>

        <div class="form-group">
            <label for="last_school">Last School</label>
            <input type="text" class="form-control" id="last_school" name="last_school" placeholder="ex-N C CONVENT SCHOOL" value="{{old('last_school','N C CONVENT SCHOOL')}}">
        </div>

        <div class="form-group">
         <label for="status">Status</label>
         <select class="form-control" id="status" name="status" required="">
          <option value="1">Active</option>
          <option value="0">Deactive</option>
         </select>
        </div>

        <div class="form-group">
         <label for="transportation">Transportation Service</label>
         <select class="form-control" id="transportation" name="transportation" required="">
          <option value="1">Yes</option>
          <option value="0">No</option>
         </select>
        </div>


        <div class="form-group {{ $errors->has('stopeages') ? ' has-error' : '' }}" id="stopeages">
        <label for="stopeages">Stopages</label>
        <select class="form-control" id="stopeages" name="stopeages">
         <option value="">---Select Stopages</option>
          @foreach($stopages as $key=>$value)
           @if (Input::old('stopeages') == $key)
           <option value="{{ $key }}" selected>{{ $value }}</option>
           @else
          <option value="{{ $key }}">{{ $value }}</option>
          @endif
          @endforeach
        </select>
         @if ($errors->has('stopeages'))
            <span class="help-block">
                  <strong>{{ $errors->first('stopeages') }}</strong>
              </span>
        @endif
      </div>
