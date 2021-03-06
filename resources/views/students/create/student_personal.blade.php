      <div class="form-group">
        <label for="father_name">Father's Name</label>
        <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" placeholder="ex-Name" required="">
      </div>

      <div class="form-group">
        <label for="mother_name">Mother's Name</label>
        <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name') }}"  placeholder="ex-Name" required="">
      </div>

      <div class="form-group {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
        <label for="date_of_birth">Date Of Birth (DD/MM/YYYY)</label>
        <input class="form-control" name="date_of_birth" id="date_pic"  value="{{ old('date_of_birth') }}" placeholder="ex-DD/MM/YYYY" required="" data-date-format="dd/mm/yyyy">
        @if ($errors->has('date_of_birth'))
            <span class="help-block">
                  <strong>{{ $errors->first('date_of_birth') }}</strong>
              </span>
        @endif
      </div>

       <div class="col-xs-6">
         <div class="form-group">
          <label for="religion">Religion</label>
          <select class="form-control" id="religion" name="religion">
          <option value="">--Select Religion</option>
          <option value="Hindu">Hindu</option>
          <option value="Muslim">Muslim</option>
          <option value="Christian">Christian</option>
          <option value="Sikh">Sikh</option>
          <option value="Buddhism">Buddhism</option>
          <option value="other">other</option>
       
          </select>          
         </div>
       </div>

       <div class="col-xs-6">
        <div class="form-group">
          <label for="castec">Caste Category</label>
          <select class="form-control" id="religion" name="castec">
          <option value="">--Select A Category</option>
          <option value="General">General</option>
          <option value="OBC">OBC</option>
          <option value="ST">ST</option>
          <option value="SC">SC</option>
          <option value="other">other</option>
          </select>
         
        </div>
       </div>

       <div class="col-xs-6">
         <div class="form-group">
          <label for="gender">Caste</label>
           <input class="form-control" placeholder="ex-Patel" name="caste" id="caste"  value="{{ old('caste') }}"  >
         </div>
       </div>

      

       <div class="col-xs-6">
         <div class="form-group">
          <label for="occupation">Occupation</label>
          <select class="form-control" id="occupation" name="occupation">
            <option value="">--Select A Occupation</option>
            <option value="Agriculutre">Agriculutre</option>
            <option value="Private Job">Private Job</option>
            <option value="Government Job">Government Job</option>
            <option value="Buesiness">Buesiness</option>
          </select>
         </div>
       </div>

      <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control" id="gender" name="gender" required="">
          <option value="1">Male</option>
          <option value="0">Female</option>
          </select>
      </div>

      <div class="form-group">
        <label for="father_no">Father's Mob. No.</label>
        <input type="text" class="form-control" id="father_no" name="father_no" value="{{ old('father_no') }}" placeholder="9999999999" data-parsley-pattern="[0-9]{10}">
      </div>

      <div class="form-group">
        <label for="emer_no">Emergency Contact No.</label>
        <input type="text" class="form-control" id="emer_no" name="emer_no" value="{{ old('emer_no') }}" placeholder="9999999999" required="" data-parsley-pattern="[0-9]{10}">
      </div>

      <div class="form-group">
        <label for="father_email">Father's Email Id</label>
        <input type="text" class="form-control" id="father_email" name="father_email" value="{{ old('father_email') }}" placeholder="ex-donjoe@example.com" data-parsley-type="email">
      </div>
