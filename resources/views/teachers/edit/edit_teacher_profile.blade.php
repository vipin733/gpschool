 

      <div class="form-group">
        <label for="teacher_name">Teacher Name</label>
        <input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Name" value="{{ old( 'teacher_name',$t->teacher_name) }}" required="">
      </div>

      <div class="form-group">
        <label for="mob_no">Mob. No.</label>
        <input type="text" class="form-control" id="mob_no" name="mob_no" value="{{ old( 'mob_no',$t->mob_no) }}" placeholder="+919999999999" data-parsley-pattern="[0-9]{10}" required="">
      </div>
 

      <div class="form-group">
        <label for="last_school">Last school</label>
        <input type="text" class="form-control" id="last_school" name="last_school" value="{{ old( 'last_school',$t->last_school) }}" placeholder="ex- SS public School">
      </div>

      <div class="form-group">
        <label for="experience">Experience</label>
        <input type="text" class="form-control" id="experience" name="experience" value="{{ old( 'experience',$t->experience) }}" placeholder="ex- 5 year">
      </div>
     
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status" required="">
          @if($t->isActive())
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
          @if($t->TransportationTaken())
             <option value="1">Yes</option>
            <option value="0">No</option>
            @else
            <option value="0">No</option>
            <option value="1">Yes</option>
            @endif
         </select>
      </div>

      <div class="form-group {{ $errors->has('stopeages') ? ' has-error' : '' }}" id="stopeages">
        <label for="stopeages">Stopage</label>
        <select class="form-control" id="stopeages" name="stopeages">
         @if($t->TransportationTaken())
         <option value="{{ $t['stopage_id'] }}">{{ $t->stopages['name'] }}</option>
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