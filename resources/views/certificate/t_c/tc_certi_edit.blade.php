@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

@include('certificate.partial_certi.heading_certi')

<div class="row">
<div class="col-md-10 col-md-offset-1"></div>
  <form action="/acadmic/{{ $t->id }}/t_c/update" method="post" class="form-horizontal" style="text-align: center;" data-parsley-validate ="">
  		{{ csrf_field() }}  {{ method_field('PATCH') }}

  		   <div class="form-group{{ $errors->has('failed') ? ' has-error' : '' }}">
                            <label for="failed" class="col-md-4 control-label">Student failed?:</label>

                            <div class="col-md-6 pull-left">
                                <select class="form-control" id="failed" name="failed" required="">
						          @if($t->failed == 'NO')
						          <option value="NO">NO</option>
						          <option value="YES">YES</option>
						          @else
						          <option value="YES">YES</option>
						          <option value="NO">NO</option>
						          @endif
						         </select>

                                @if ($errors->has('failed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('failed') }}</strong>
                                    </span>
                                @endif
                            </div>
              </div>
           
              <div class="form-group{{ $errors->has('subjects') ? ' has-error' : '' }}">
                            <label for="subjects" class="col-md-4 control-label">Subjects Offered</label>

                            <div class="col-md-6">
                                <textarea id="subjects"  class="form-control" name="subjects" value="{{ old('subjects') }}" required="">{{$t->subjects}}
                                </textarea>

                                @if ($errors->has('subjects'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subjects') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div>

            <div class="form-group{{ $errors->has('lclass') ? ' has-error' : '' }}">
                            <label for="lclass" class="col-md-4 control-label">Student Last Class(in Digit):</label>

                            <div class="col-md-6">
                                <input id="lclass" type="text" class="form-control" name="lclass" value="{{ old('lclass',$t->lclass) }}" required="">
                                

                                @if ($errors->has('lclass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lclass') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div>

             <div class="form-group{{ $errors->has('lschool') ? ' has-error' : '' }}">
                            <label for="lschool" class="col-md-4 control-label">/School/Board/ Annual examination last taken with result:</label>

                            <div class="col-md-6">
                                <input id="lschool" type="text" class="form-control" name="lschool" value="{{ old('lschool', $t->lschool) }}" required="">
                                

                                @if ($errors->has('lschool'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lschool') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div>

             <div class="form-group{{ $errors->has('promotion') ? ' has-error' : '' }}">
                            <label for="promotion" class="col-md-4 control-label">Whether qualified for promotion to the next class?:</label>

                            <div class="col-md-6 pull-left">
                                <select class="form-control" id="promotion" name="promotion" required="">
                                 @if($t->promotion == 'YES')
						          <option value="YES">YES</option>
						          <option value="NO">NO</option>
						          @else
						          <option value="NO">NO</option>
						          <option value="YES">YES</option>
						          @endif
						         </select>
                                @if ($errors->has('promotion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('promotion') }}</strong>
                                    </span>
                                @endif
                            </div>
              </div> 

              <div class="form-group{{ $errors->has('paid') ? ' has-error' : '' }}">
                            <label for="paid" class="col-md-4 control-label">Whether the pupil has paid all due to vidyalya?:</label>

                            <div class="col-md-6 pull-left">
                                <select class="form-control" id="paid" name="paid" required="">
						           @if($t->paid == 'YES')
						          <option value="YES">YES</option>
						          <option value="NO">NO</option>
						          @else
						          <option value="NO">NO</option>
						          <option value="YES">YES</option>
						          @endif
						         </select>

                                @if ($errors->has('paid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paid') }}</strong>
                                    </span>
                                @endif
                            </div>
              </div>  


             <div class="form-group{{ $errors->has('concession') ? ' has-error' : '' }}">
                            <label for="concession" class="col-md-4 control-label">Whether the student was in reciept of any fee concession, if so the  nature of such concession:</label>

                            <div class="col-md-6">
                                <input id="concession" type="text" class="form-control" name="concession" value="{{ old('concession',$t->concession) }}" required="">
                                

                                @if ($errors->has('concession'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('concession') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div>  

               <div class="form-group{{ $errors->has('ncc') ? ' has-error' : '' }}">
                            <label for="ncc" class="col-md-4 control-label">Whether the student was is NCC Cadet/Boy Scout/Girl Guide (give details)?:</label>

                            <div class="col-md-6">
                                <input id="ncc" type="text" class="form-control" name="ncc" value="{{ old('ncc',$t->ncc) }}" required="">
                                

                                @if ($errors->has('ncc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ncc') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div> 

               <div class="form-group{{ $errors->has('struck_date') ? ' has-error' : '' }}">
                            <label for="struck_date" class="col-md-4 control-label">Date on which student's name was struck off the rolls of vidyalya:</label>

                            <div class="col-md-6">
                                <input  id="date_pic" type="text" class="form-control" name="struck_date" value="{{ old('struck_date',$t->struck_date) }}" required="" data-date-format="dd/mm/yyyy">
                                

                                @if ($errors->has('struck_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('struck_date') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div> 

               <div class="form-group{{ $errors->has('couse') ? ' has-error' : '' }}">
                            <label for="couse" class="col-md-4 control-label">Reason for leaving the school:</label>

                            <div class="col-md-6">
                                <input id="couse" type="text" class="form-control" name="couse" value="{{ old('couse',$t->couse) }}" required="">
                                

                                @if ($errors->has('couse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('couse') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div> 

               <div class="form-group{{ $errors->has('meeting') ? ' has-error' : '' }}">
                            <label for="meeting" class="col-md-4 control-label">No. of meetings upto date:</label>

                            <div class="col-md-6">
                                <input id="meeting" type="text" class="form-control" name="meeting" value="{{ old('meeting',$t->meeting) }}" required="">
                                

                                @if ($errors->has('meeting'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meeting') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div> 

               <div class="form-group{{ $errors->has('no_days') ? ' has-error' : '' }}">
                            <label for="no_days" class="col-md-4 control-label">No. of school days the student attended:</label>

                            <div class="col-md-6">
                                <input id="no_days" type="text" class="form-control" name="no_days" value="{{ old('no_days',$t->no_days) }}" required="">
                                

                                @if ($errors->has('no_days'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_days') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div>

               <div class="form-group{{ $errors->has('conduct') ? ' has-error' : '' }}">
                            <label for="conduct" class="col-md-4 control-label">General Conduct:</label>

                            <div class="col-md-6">
                                <input id="conduct" type="text" class="form-control" name="conduct" value="{{ old('conduct',$t->conduct) }}" required="">
                                

                                @if ($errors->has('conduct'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('conduct') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div>

               <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                            <label for="remarks" class="col-md-4 control-label">Any other remarks:</label>

                            <div class="col-md-6">
                                <input id="remarks" type="text" class="form-control" name="remarks" value="{{ old('remarks',$t->remarks) }}" required="">
                                

                                @if ($errors->has('remarks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remarks') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div>

               <div class="form-group{{ $errors->has('reg_no_9_to_12') ? ' has-error' : '' }}">
                            <label for="reg_no_9_to_12" class="col-md-4 control-label">Student Reg. No(in case class-IX to XII):</label>

                            <div class="col-md-6">
                                <input id="reg_no_9_to_12" type="text" class="form-control" name="reg_no_9_to_12" value="{{ old('reg_no_9_to_12',$t->reg_no_9_to_12) }}">
                                

                                @if ($errors->has('reg_no_9_to_12'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reg_no_9_to_12') }}</strong>
                                    </span>
                                @endif
                            </div>
               </div>
            
            <div class="col-md-4 col-md-offset-4">
            	<button class="btn btn-primary btn-lg btn-block">Submit</button>
            	<a href="/acadmic/{{ $t->students['reg_no'] }}/t_c_view" class="btn btn-warning btn-lg btn-block"><i class="fa fa-backward faa-passing-reverse animated" aria-hidden="true"></i> Back</a>
            </div>

	 </form>
</div>
@stop

@section('script')
<script src="/js/bootstrap-datepicker.min.js"></script>
   @include('partial.datepicker')
@stop