@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

<div class="row">
    
    <div class="col-sm-2 col-sm-offset-5">
        <a href="#" class="thumbnail">
          @if(!$teacher->avatar)
             @if($teacher->gender == 1)
             <img src="{{ URL::to('/image/teacher_male.png') }}" data-toggle="modal" data-target="#myModal" alt="{{ $teacher->teacher_name }}" />
            @else
             <img src="{{ URL::to('/image/teacher_female.png') }}" data-toggle="modal" data-target="#myModal" alt="{{ $teacher->teacher_name }}" />
            @endif
          @else
            <img src="{{ URL::to('/image/',$teacher->avatar) }}" data-toggle="modal" data-target="#myModal" alt="{{ $teacher->teacher_name }}" class="img-rounded" />
            @endif
        </a>
        @include('teachers.t_avatar_form')
      </div>

       <div class="col-sm-10 col-sm-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading"><button class="btn btn-primary btn-block">
                @if($teacher->isStaff())
                Staff Profile Info.
                @else
                Teacher Profile Info.
                @endif
              </button></div>
                <div class="panel-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered  table-hover">
                           <thead>
                             <tr>
                                 <th class="text-center">Registraion no.</th>
                                 <td class="text-center">{{ $teacher->reg_no }}</td>
                                 <th class="text-center">Status</th>
                                 <td class="text-center">
                                 @if($teacher->isActive())
                                 Active
                                 @else
                                 Deactive
                                 @endif
                                 </td>
                              </tr>

                               <tr>
                                 <th class="text-center">Name</th>
                                 <td class="text-center">{{ $teacher->teacher_name }}</td>
                                 <th class="text-center">Mob. NO.</th>
                                 <td class="text-center">{{ $teacher->mob_no }}</td>
                               </tr>

                               <tr>
                                 <th class="text-center">Last School</th>
                                 <td class="text-center">
                                 @if($teacher->last_school)
                                  {{ $teacher->last_school }}
                                  @else
                                  N/A
                                  @endif
                                 </td>
                                 <th class="text-center">Experience</th>
                                 <td class="text-center">
                                 @if($teacher->experience)
                                 {{ $teacher->experience }}
                                 @else
                                 N/A
                                 @endif
                                 </td>
                               </tr>


                               <tr>
                                 <th class="text-center">Transportation Taken</th>
                                 <td class="text-center">
                                   @if($teacher->TransportationTaken())
                                  Yes
                                  @else
                                  No
                                  @endif
                                 </td>
                                 <th class="text-center">Transportation Stopage</th>
                                 <td class="text-center">
                                 @if($teacher->stopages)
                                 {{ $teacher->stopages['name'] }}
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
              <div class="panel-heading"><button class="btn btn-primary btn-block">
              @if($teacher->isStaff())
                Staff Personal Info.
                @else
                Teacher Personal Info.
                @endif 
              </button></div>
                <div class="panel-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered  table-hover">
                           <thead>
                             <tr>
                                 <th class="text-center">Father Name</th>
                                 <td class="text-center">{{ $teacher->father_name }}</td>
                                 <th class="text-center">Mother Name</th>
                                 <td class="text-center">{{ $teacher->mother_name }}</td>
                              </tr>

                               <tr>
                                 <th class="text-center">Date Of Birth</th>
                                 <td class="text-center">
                                 {{ $teacher->date_of_birth->format('d/m/Y') }}
                                 </td>
                                 <th class="text-center">Gender</th>
                                 <td class="text-center">
                                 @if($teacher->gender == 1)
                                 Male
                                 @else
                                 Female
                                 @endif
                                 </td>
                               </tr>

                               <tr>
                               <th class="text-center">Date Of Joining</th>
                                 <td class="text-center">{{ $teacher->date_of_joining->format('d/m/Y')}}</td>
                                 <th class="text-center">Emergency No</th>
                                 <td class="text-center">
                                  {{ $teacher->emergency_no }}
                                 </td>
                                </tr>

                               <tr>
                                 <th colspan="2" class="text-center">Email</th>
                                 <td colspan="2" class="text-center">
                                 @if($teacher->email)
                                  {{ $teacher->email }}
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
              <div class="panel-heading"><button class="btn btn-primary btn-block">
              @if($teacher->isStaff())
                 Staff Address Info.
                @else
                 Teacher Address Info.
                @endif
              </button></div>
                <div class="panel-body">

                  <div class="col-sm-6">
                    <h4>Permanent Address</h4>
                    <address>
                      {{ $teacher->address }}, {{ $teacher->city['name']}}<br>
                      {{ $teacher->states['name'] }}, {{ $teacher->zip_pin }}
                    </address>
                  </div>

                  <div class="col-sm-6">
                    <h4>Communication Address</h4>
                    <address>
                      {{ $teacher->address1 }}, {{ $teacher->tcity['name']}}<br>
                      {{ $teacher->tstates['name'] }}, {{ $teacher->tzip_pin }}
                    </address>
                  </div>

                </div>
           </div>
       </div>

       <div class="col-md-4 col-md-offset-4">
        <a href="{{ URL::to('/teacher/' . $teacher->reg_no.'/edit') }}" class="btn btn-primary btn-block btn-lg">Update Profile</a>
        <br>
       </div>
 </div>

@endsection
