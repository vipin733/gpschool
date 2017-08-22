
    <fieldset readonly>
      <div class="form-group">
        <label for="reg_no">Registration No.</label>
        <input type="text"  name="reg_no" class="form-control" value="{{ old( 'reg_no',$s->reg_no) }}" readonly>
      </div>
    </fieldset>
    
    <div class="form-group">
        <label for="student_name">Students Name</label>
        <input type="text" class="form-control" id="student_name" value="{{ old( 'student_name',$s->student_name) }}" name="student_name" placeholder="Name" required="">
    </div>
     
      <div class="form-group">
        <label for="course">Admission Course</label>
        <select class="form-control" id="created_course" name="created_course" required="">
          <option value="{{ $s['created_course_id'] }}">{{ $s->created_courses['name'] }}</option>
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
          <option value="{{ $s['course_id'] }}">{{ $s->courses['name'] }}</option>
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
            <option value="{{ $s->asessions['id'] }}">{{ $s->asessions['name'] }}</option>
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
            <input type="text" class="form-control" id="date_pic" name="date_of_admission" placeholder="ex-22/06/2015" value="{{old('date_of_admission',$s->date_of_admission->format('d/m/Y'))}}" required="">
        </div>
  

    <div class="form-group">
            <label for="last_school">Last School</label>
            <input type="text" class="form-control" id="last_school" name="last_school" placeholder="ex-SS public School" value="{{ old( 'last_school',$s->last_school) }}">
    </div>

    <div class="form-group">
         <label for="status">Status</label>
         <select class="form-control" id="status" name="status" required="">
          @if($s->status == 1)
          <option value="1">Active</option>
          <option value="0">Deactive</option>
          @else 
          <option value="0">Deactive</option>
          <option value="1">Active</option>         
          @endif
         </select>
    </div>  

    <div class="form-group">
         <label for="transportation">Transportation Service</label>
         <select class="form-control" id="transportation" name="transportation" required="">
          @if($s->transportation == 1)
          <option value="1">Yes</option>
          <option value="0">No</option>
          @else 
          <option value="0">No</option>
          <option value="1">Yes</option>         
          @endif
         </select>
    </div> 
   
     <div class="form-group  {{ $errors->has('stopeages') ? ' has-error' : '' }}" id="stopeage">
        <label for="stopeages">Stopages</label>
         <select class="form-control" id="stopeages" name="stopeages">
         @if($s->transportation == 1)
         <option value="{{ $s['stopage_id'] }}">{{ $s->stopages['name'] }}</option>
         @else
         <option value="">-- Select Stopage</option>
         @endif
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