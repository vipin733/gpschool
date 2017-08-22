@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

@include('certificate.partial_certi.heading_certi')

<div class="row" style="margin-top: 50px;">
 @if(count($s->tc_certis))
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body tc_view_panal">
        <div class="text-center">
           <h1><b>  Narayani Challenger Convent School</b></h1>
            <h4>Gangapur (Mangari), Varanasi, U.P.-221202</h4>
            <h5>(Recognized By Central Board of Secondery Education, Delhi-110092)</h5>
            <h3><strong class="heade_cc">Transfer Certificate</strong></h3><br>

        </div>
        <div class="col-md-10 col-md-offset-1">
          <h4>School No. <strong class=""> 55690</strong>  S.R. No. <strong class=""> {{$s->tc_certis['id']}}</strong> Addmission No. <strong class=""> {{$s['id']}}</strong> Affiliation No. <strong class=""> 2132499</strong> Renewed Upto <strong class=""> 2020<br><br></strong> Status of school: <strong class=""> Secondary</strong>
             Registration No of Candidate(in case Class-IX to XII): <strong class=""> {{ $s->tc_certis['reg_no_9_to_12'] }}</strong>
             </h4>
        </div>
        
        <div class="col-md-12">
        <h4>
          <ol>
            <li>
              Name Of pupil : <strong class="" style="margin-left: 80px;"> {{ $s->student_name }}</strong>
            </li><br>
            <li>
              Mother's Name : <strong class="" style="margin-left: 80px;"> {{ $s->mother_name }}</strong>
            </li><br>
            <li>
              Father's Name : <strong class="" style="margin-left: 80px;"> {{ $s->father_name }}</strong>
            </li><br>
            <li>
              Nationality : <strong class="" style="margin-left: 80px;"> INDIAN</strong>
            </li><br>
            <li>
              Whether the pupil belongs to SC/ST/OBC:  
              <strong class="" style="margin-left: 80px;">
              @if($s->castec == 'General')
              @else
               {{$s->castec}}
              @endif
              </strong>
            </li><br>
            <li>
              Date of birth according to the Addmission Register(in figure): <strong class="">  {{$s->date_of_birth->format('d/m/Y')}}</strong><br>
              (in words):<strong class="" style="margin-left: 80px;"> {{$pday}} {{ $month }}, {{ $pyear }}</strong>
            </li><br>
            <li>
              Whether the pupil failed?:<strong class="" style="margin-left: 80px;"> {{$s->tc_certis['failed']}}</strong>
            </li><br>
             <li>
              Subjects offered:<strong class=""> {{$s->tc_certis['subjects']}}</strong>
            </li><br>
            <li>
              Class in which the last studied(in figure):<strong class="" style="margin-left: 80px;"> {{$s->tc_certis['lclass']}}</strong><br>
              (in words):<strong class="" style="margin-left: 80px;"> {{$lclassword }}</strong>
            </li><br>
            <li>
              /School/Board/ Annual examination last taken with result:<strong class=""> {{$s->tc_certis['lschool']}}</strong>
            </li><br>
            <li>
              Whether qualified for promotion to the next class?:<strong class=""> {{$s->tc_certis['promotion']}}</strong>
            </li><br>
            <li>
             Whether the pupil has paid all due to Vidyalya?<strong class=""> {{$s->tc_certis['paid']}}</strong>
            </li><br>
            <li>
            Whether the pupil was in reciept of any fee concession, if so the  nature of such concession:<strong class=""> {{$s->tc_certis['concession']}}</strong>
            </li><br>
            <li>
            Whether the pupil was is NCC Cadet/Boy Scout/Girl Guide (give details):<strong class=""> {{$s->tc_certis['ncc']}}</strong>
            </li><br>
            <li>
           Date on which pupil's name was struck off the rolls of vidyalya:<strong class=""> {{$s->tc_certis['struck_date']}}</strong>
            </li><br>
            <li>
           Reason for leaving the school:<strong class=""> {{$s->tc_certis['couse']}}</strong>
            </li><br>
            <li>
           No. of meetings upto date:<strong class="" style="margin-left: 80px;"> {{$s->tc_certis['meeting']}}</strong>
            </li><br>
            <li>
           No. of school days the pupil attended:<strong class="" style="margin-left: 80px;"> {{$s->tc_certis['no_days']}}</strong>
            </li><br>
            <li>
           General Conduct:<strong class="" style="margin-left: 80px;"> {{$s->tc_certis['conduct']}}</strong>
            </li><br>
            <li>
           Whether school is under Govt./Minority/Independent Category:<strong class=""> NO</strong>
            </li><br>
            <li>
           Any other remarks:<strong class="" style="margin-left: 80px;"> {{$s->tc_certis['remarks']}}</strong>
            </li><br>
            <li>
           Date of issue of certificate:<strong class="" style="margin-left: 80px;"> {{$s->tc_certis['created_at']->format('d/m/Y')}}</strong>
            </li><br>
          </ol>
          </h4>
        </div>
        
        <div class="col-md-4" style="margin-top: 100px;">
         <strong style="border-top: solid;">Prepared By
          (Name & Designation)</strong> 
        </div>

        <div class="col-md-4" style="margin-top: 100px;">
         <strong style="border-top: solid;">
           Checked By
          (Name & Designation)
         </strong>          
        </div>

        <div class="col-md-4" style=" margin-top: 100px;">
         <strong style="border-top: solid;">
            Sign. of Principal with seal
         </strong>        
        </div>
        <div class="col-md-12">
          <p>Note:If, This T.C. is issued by the officiating/Incharge Principle, in variably countersigned by the Manager- V.M.C. </p>
        </div>
      
          
    </div>
  </div>
 </div>

    <div class="text-center">
      <a name="print_char" class="btn btn-primary" href="{{ URL::to('/acadmic/' . $s->tc_certis['id'].'/t_c_print') }}"><i class="fa fa-print faa-pulse animated" aria-hidden="true"></i> Print
      </a>
      <a name="print_char" class="btn btn-success" href="{{ URL::to('/acadmic/' . $s->tc_certis['id'].'/download_t_c_print') }}"><i class="fa fa-download faa-vertical animated" aria-hidden="true"></i> Save
      </a>
      <a name="print_char" class="btn btn-warning" href="{{  URL::to('/acadmic/' . $s->reg_no.'/t_c/'.$s->tc_certis['id'].'/edit')  }}"><i class="fa fa-pencil-square-o faa-pulse animated" aria-hidden="true"></i> Update
      </a>
     </div>

 @else
    <div class="text-center" style="margin-bottom: 160px; margin-top:160px;">
      <H1>No Record Found. Make Transfer Certificate <a href="{{ URL::to('/acadmic/' . $s->reg_no.'/t_c') }}">Make</a></H1>
    </div>
    @endif
</div>
@stop
