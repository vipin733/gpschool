  <div class="form-group">
        <label for="father_name">Father's Name</label>
        <input type="text" class="form-control" id="father_name" name="father_name" placeholder="ex-Name" value="{{ old( 'father_name', $t->father_name) }}" required="">
      </div>
      <div class="form-group">
        <label for="mother_name">Mother's Name</label>
        <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old( 'reg_no', $t->reg_no) }}" placeholder="ex-Name" required="">
      </div>
      
      <div class="form-group">
        <label for="date_of_birth">Date Of Birth (DD/MM/YYYY):</label>
        <input  class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old( 'date_of_birth', $t->date_of_birth->format('d/m/Y')) }}" placeholder="ex-02/11/2000" required="">
      </div>

      <label for="gender">Gender</label>
      <select class="form-control" id="gender" name="gender" required="">
           @if( $t->gender == 1 )
          <option value="1">Female</option>
          <option value="2">Male</option>
          
          @else
          <option value="2">Male</option>
          <option value="1">Female</option>
         @endif
      </select>
        <br>
          <div class="form-group">
        <label for="email">Email Id</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old( 'email', $t->email) }}" placeholder="Example@example.com" data-parsley-type="email">
      </div>

      <div class="form-group">
        <label for="emergency_no">Emergency Mob. No.</label>
        <input type="text" class="form-control" id="emergency_no" name="emergency_no" value="{{ old( 'emergency_no', $t->emergency_no) }}"  placeholder="+919999999999" required="" data-parsley-pattern="[0-9]{10}">
      </div>
     <div class="form-group">
        <label for="date_of_joining">Year Of Joining (YYYY)</label>
        <input type="text" class="form-control" id="date_pic" name="date_of_joining" value="{{ old('date_of_joining',$t->date_of_joining->format('d/m/Y')) }}" placeholder="ex-02/11/2000" required="">
      </div>