           <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Profile Details</h3>
                           <fieldset readonly>
                            <div class="form-group">
                                <label for="reg_no">Registration No.</label>
                                <input class="form-control" id="name" name="reg_no" type="text" value="{{$regno}}" required="required" readonly>
                            </div>
                            </fieldset>
                            <div class="form-group">
                                <label for="student_name">Students Name</label> <span class="pull-right" id="resultEma"></span>
                                <input type="text" class="form-control" id="student_name" value="{{ old('student_name') }}" name="student_name" placeholder="Name" required="required">
                            </div>
                            
                            <div class="form-group">
                                <label for="course">Students Class</label>
                                <select class="form-control" id="course" name="course" required="required">
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
                                <label for="section">Section</label>
                                <select class="form-control" id="section" name="section" required="required">
                                 <option value="">---Select Section</option>
                                  @foreach($sections as $key=>$value)
                                   @if (Input::old('section') == $key)
                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                   @else
                                  <option value="{{ $key }}">{{ $value }}</option>
                                  @endif
                                  @endforeach
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="year_of_admission">Year Of Addmission</label>
                                <input type="text" class="form-control" id="year_of_admission" name="year_of_admission" placeholder="2016" value="{{old('year_of_admission')}}" required="required">
                              </div>

                              <div class="form-group">
                                <label for="last_school">Last School</label>
                                <input type="text" class="form-control" id="last_school" name="last_school" placeholder="ex-SS public School" value="{{old('last_school')}}">
                             </div>
                
                            <div class="form-group">
                             <label for="status">Status</label>
                             <select class="form-control" id="status" name="status" required="required">
                              <option value="0">Active</option>
                              <option value="1">Deactive</option>
                             </select>
                            </div>

                            <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>
                        </div>
                    </div>
                </div>