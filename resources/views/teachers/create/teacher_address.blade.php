
  <div class="col-md-5">
      <h4>Permanent Address</h4>
      <div class="form-group">
        <label for="address">Address Line 1</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address') }}" required="">
      </div>

     
      <div class="form-group">
          <label for="district">Select District</label>
          <select class="form-control" id="district" name="district" required="">
          <option value="">---Select District</option>
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
          <option value="">---Select State</option>
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
            <input type="text" class="form-control" id="zip_pin" name="zip_pin" value="{{ old('zip_pin') }}" placeholder="Ex-221204" required="" data-parsley-pattern="[0-9]{6}">
      </div>

  </div>

  <div class="col-md-2">
        <br><br><br>
           <input type="checkbox" onclick="FillBilling(this.form)" name="samepermanent">
        <em>same as permanent</em><br>
  </div>
       
  <div class="col-md-5">
        <h4>Comunnication Address</h4>
      <div class="form-group">
        <label for="address1">Address Line 1</label>
        <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1') }}" placeholder="Address" required="">
      </div>

      <div class="form-group">
         <label for="district1">Select District</label>
         <select class="form-control" id="district1" name="district1" required="">
         <option value="">---Select District</option>
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
          <option value="">---Select State</option>
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
            <input type="text" class="form-control" id="zip_pin1" name="zip_pin1" value="{{ old('zip_pin1') }}" placeholder="Ex-221204" required="" data-parsley-pattern="[0-9]{6}">
      </div>
  </div>    
  

  


  