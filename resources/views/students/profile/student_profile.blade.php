@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

<div class="row">
     
  <div class="col-md-2 col-md-offset-5">
        <a href="#" class="thumbnail">
          @if(!$student->avatar)
          @if($student->gender == 1)
           <img src="{{ URL::to('/image/student_male.png') }}" data-toggle="modal" data-target="#myModal" alt="{{$student->student_name }}" class="img-rounded" />
          @else
           <img src="{{ URL::to('/image/student_female.png') }}" data-toggle="modal" data-target="#myModal" alt="{{ $student->student_name }}" class="img-rounded" />
          @endif
          @else
          <img src="{{ URL::to('/image/',$student->avatar) }}" data-toggle="modal" data-target="#myModal" alt="{{ $student->student_name }}" class="img-rounded" />
          @endif
        </a>
        @include('students.profile.avatar_form')
  </div>

</div>

<div class="row">  

  <div class="col-md-1">
      @include('students.profile.student_profile_nav')  
  </div> 
  <div class="col-md-11">

    <div class="col-sm-10 col-sm-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading">
              <button class="btn btn-primary btn-block">Student Profile Info.</button>
              </div>
              <div class="panel-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered  table-hover">
                      <thead>
                        <tr>
                           <th class="text-center">Registraion no.</th>
                           <td class="text-center">{{ $student->reg_no }}</td>
                           <th class="text-center">Status</th>
                           <td class="text-center">
                           @if($student->isActive())
                           Active
                           @else
                           Deactive
                           @endif
                           </td>
                        </tr>

                        <tr>
                         <th class="text-center">Name</th>
                         <td class="text-center">{{ $student->student_name }}</td>
                         <th class="text-center">Current Course</th>
                         <td class="text-center">{{ $student->courses['name'] }}</td>
                        </tr>

                        <tr>
                         <th class="text-center">Section</th>
                         <td class="text-center">
                         @if($student->studentacadmic)
                          {{ $student->studentacadmic->sections['name'] }}
                          @endif
                         </td>
                         <th class="text-center">Roll No</th>
                         <td class="text-center">
                         @if($student->studentacadmic)
                         {{ $student->studentacadmic->sections['name'] }}{{ $student->studentacadmic['roll_no'] }}
                         @endif
                         </td>
                        </tr>

                        <tr>
                         <th class="text-center">Current Session</th>
                         <td class="text-center">
                          {{ $asession['name'] }}
                         </td>
                         <th class="text-center">Admission Session</th>
                         <td class="text-center">
                         {{ $student->asessions['name'] }}
                         </td>
                        </tr>

                        <tr>
                         <th class="text-center">Admission Course</th>
                         <td class="text-center">
                          {{ $student->created_courses['name'] }}
                         </td>
                         <th class="text-center">Date of Admission</th>
                         <td class="text-center">
                         {{ $student->date_of_admission->format('d/m/Y') }}
                         </td>
                        </tr>

                        <tr>
                         <th colspan="1" class="text-center">Last School</th>
                         <td colspan="3" class="text-center">
                         @if($student->last_school)
                          {{ $student->last_school }}
                         @else
                          N/A
                         @endif 

                        <tr>
                           <th class="text-center">Transportation Taken</th>
                           <td class="text-center">
                             @if($student->transportation == 1)
                           	Yes
                           	@else
                           	No
                           	@endif 
                           </td>
                           <th class="text-center">Transportation Stopage</th>
                           <td class="text-center">
                           @if($student->stopages)
                           {{ $student->stopages['name'] }}
                           @else
                           N/A
                           @endif
                           </td>
                        </tr>

                      </thead>                  
                    </table>
                  </div>
                </div>
          </div>        
        </div>

        <div class="col-sm-10 col-sm-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading"><button class="btn btn-primary btn-block">Student Personal Info.</button></div>
                <div class="panel-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered  table-hover">
                           <thead>
                             <tr>
                                 <th class="text-center">Father Name</th>
                                 <td class="text-center">{{ $student->father_name }}</td>
                                 <th class="text-center">Mother Name</th>
                                 <td class="text-center">{{ $student->mother_name }}</td>
                              </tr>

                               <tr>
                                 <th class="text-center">Date Of Birth</th>
                                 <td class="text-center">
                                 {{ $student->date_of_birth->format('d/m/Y') }}
                                 </td>
                                 <th class="text-center">Gender</th>
                                 <td class="text-center">
                                 @if($student->gender == 1)
                                 Male
                                 @else
                                 Female
                                 @endif
                                 </td>
                               </tr>

                               <tr>
                                 <th class="text-center">Religion</th>
                                 <td class="text-center">
                                  {{ $student->religion }}
                                 </td>
                                 <th class="text-center">Category</th>
                                 <td class="text-center">
                                 {{ $student->castec }}
                                 </td>
                               </tr>

                               <tr>
                                 <th class="text-center">Caste</th>
                                 <td class="text-center">{{ $student->caste }}</td>
                                 <th class="text-center">Father Occupation</th>
                                 <td class="text-center">
                                  {{$student->occupation}}
                                 </td>
                               </tr>

                               <tr>
                                 <th class="text-center">Emergency No</th>
                                 <td class="text-center">
                                  {{ $student->emer_no }}
                                 </td>
                                 <th class="text-center">Parent's Mo. No.</th>
                                 <td class="text-center">
                                 @if($student->parent_no)
                                 {{ $student->parent_no}}
                                 @else
                                 N/A
                                 @endif
                                 </td>
                               </tr>
                               <tr>
                                 <th colspan="1" class="text-center">Parent's Email</th>
                                 <td colspan="3" class="text-center">
                                 @if($student->father_email)
                                  {{ $student->father_email }}
                                  @else
                                  N/A
                                  @endif
                                 </td>
                               </tr>

                            </thead>                  
                        </table>
                      </div>
                </div>
           </div>        
       </div>

       <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading"><button class="btn btn-primary btn-block">Student Address Info.</button></div>
                <div class="panel-body">
                  
                  <div class="col-sm-6">
                  	<h4>Permanent Address</h4>
                  	<address>
                  		{{ $student->address }}, {{ $student->city['name']}}<br>
                  		{{ $student->states['name'] }}, {{ $student->zip_pin }}
                  	</address>
                  </div>

                  <div class="col-sm-6">
                  	<h4>Communication Address</h4>
                  	<address>
                  		{{ $student->address1 }}, {{ $student->ccity['name']}}<br>
                  		{{ $student->sstates['name'] }}, {{ $student->zip_pin1 }}
                  	</address>
                  </div>
                    
                </div>
           </div>        
       </div>
       <div class="col-md-4 col-md-offset-4">
       	<a href="{{ URL::to('/student/' . $student->reg_no.'/edit') }}" class="btn btn-primary btn-block btn-lg">Update Profile</a>
       	<br>
       </div>
  </div>
       
</div>

@stop 

@section('script')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.7.0/parsley.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    function openNav() {
    document.getElementById("ddmySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("ddmySidenav").style.width = "0";
}
  </script>
@stop