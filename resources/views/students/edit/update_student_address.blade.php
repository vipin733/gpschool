
  <div class="col-md-5">
      <div class="form-group">
        <label for="address">Permanent Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old( 'address',$s->address) }}" placeholder="Address Line 1" required="">
      </div>

      <div class="form-group">
          <label for="district">Select District</label>
          <select class="form-control" id="district" name="district" required="">
          <option value="{{ $s['city_id'] }}">{{ $s->city['name'] }}</option>
           @foreach($cityies as $key=>$value)
           @if (Input::old('district') == $key)
          <option value="{{ $key }}" selected>{{ $value }}</option>
           @else
          <option value="{{ $key }}">{{ $value }}</option>
          @endif
          @endforeach
         </select>
      </div>

      <div class="form-group">
          <label for="state">Select State</label>
          <select class="form-control" id="state" name="state" required="">
          <option value="{{ $s['state_id'] }}">{{ $s->states['name'] }}</option>
           @foreach($state as $key=>$value)
           @if (Input::old('state') == $key)
           <option value="{{ $key }}" selected>{{ $value }}</option>
           @else
          <option value="{{ $key }}">{{ $value }}</option>
          @endif
          @endforeach
        </select>
      </div>

        <div class="form-group">
            <label for="zip_pin">Pin/Zip.</label>
            <input type="text" class="form-control" id="zip_pin" name="zip_pin" value="{{ old( 'zip_pin',$s->zip_pin) }}" placeholder="ex-221204" required="" data-parsley-pattern="[0-9]{6}">
        </div>
  </div>

  <div class="col-md-2">
        <br><br><br>
        <div class="form-group">
           <input type="checkbox" onclick="FillBilling(this.form)" name="billingtoo">
           <em>same as permanent</em>
        </div>   
  </div>
       
  <div class="col-md-5">
          <div class="form-group">
            <label for="address1">Communication Address</label>
            <input type="text" class="form-control" id="address1" name="address1" value="{{ old( 'address1',$s->address1) }}" placeholder="Address" required="">
          </div>

          <div class="form-group">
            <label for="district1">Select District</label>
            <select class="form-control" id="district1" name="district1" required="">
            <option value="{{ $s['ccity_id'] }}">{{ $s->ccity['name'] }}</option>
             @foreach($cityies as $key=>$value)
             @if (Input::old('district1') == $key)
             <option value="{{ $key }}" selected>{{ $value }}</option>
             @else
            <option value="{{ $key }}">{{ $value }}</option>
            @endif
            @endforeach
           </select>
          </div>
          
          <div class="form-group">
            <label for="state1">Select State</label>
            <select class="form-control" id="state1" name="state1" required="">
              <option value="{{ $s['cstate_id'] }}">{{ $s->sstates['name'] }}</option>
             @foreach($state as $key=>$value)
               @if (Input::old('state1') == $key)
               <option value="{{ $key }}" selected>{{ $value }}</option>
               @else
              <option value="{{ $key }}">{{ $value }}</option>
              @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="zip_pin1">Pin/Zip.</label>
            <input type="text" class="form-control" name="zip_pin1" id="zip_pin1" value="{{ old( 'zip_pin1',$s->zip_pin1) }}" placeholder="ex-221204" required="" data-parsley-pattern="[0-9]{6}">
          </div>
  </div>
          
  
   

  


  