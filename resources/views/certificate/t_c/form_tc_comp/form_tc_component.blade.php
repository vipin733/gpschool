           <h2 style="text-align: center;"><strong>{{$record_name}}</strong></h2>
  		     <div class="form-group">
			    <label for="{{$date_of_addmission_f}}">Date of addmission</label>
			    <input type="text" class="form-control" value="{{ $date_of_addmission_v or '' }}" name="{{$date_of_addmission_f}}" id="date_pic" placeholder="ex-02/11/2010">
			  </div>

			  <div class="form-group">
			    <label for="{{$date_of_upgradtion_f}}">Date of upgradation</label>
			    <input type="text" class="form-control" value="{{ $date_of_upgradtion_v or '' }}" name="{{$date_of_upgradtion_f}}" id="date_pic" placeholder="ex-02/11/2011">
			 </div>

			 <div class="form-group">
			    <label for="{{$removal_date_f}}">Date of removal</label>
			    <input type="text" class="form-control" value="{{ $removal_date_v or '' }}" name="{{$removal_date_f}}" id="date_pic" placeholder="ex-02/11/2011">
			 </div>

			 <div class="form-group">
			    <label for="{{$couse_f}}">Couse</label>
			    <textarea placeholder="Describe yourself here..." class="form-control" rows="3" name="{{$couse_f}}" id="{{$couse_f}}">{{ $couse_v or '' }}</textarea>
			 </div>

			 <div class="form-group">
			    <label for="{{$seesion_f}}">Session</label>
			    <input type="text" class="form-control" value="{{ $seesion_v or '' }}" name="{{$seesion_f}}" id="{{$seesion_f}}" placeholder="ex-2010-11">
			 </div>

			 <div class="form-group">
			    <label for="{{$conduct_f}}">Conduct</label>
			    <input type="text" class="form-control"  value="{{ $conduct_v or '' }}" name="{{$conduct_f}}" id="{{$conduct_f}}" placeholder="ex-Good">
			 </div>

			 <div class="form-group">
			    <label for="{{$work_f}}">Work</label>
			    <select class="form-control" name="{{$work_f}}"  id="{{$work_f}}">
			        <option value="">--Select Work</option>
			    	<option value="passed">Pass</option>
			    	<option value="failed">Failed</option>
			    </select>
			 </div>

			 