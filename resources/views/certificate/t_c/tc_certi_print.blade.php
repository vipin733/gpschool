<!DOCTYPE html>
<html>
<head>

    <title>Printing</title>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
   <style type="text/css">
     .heade_cc{
  background-color: black;
    color: white;
    padding: 10px;
}

.sernotc{
  
   padding: 5px; 
   border: solid;
   border-width: 2px;
}
.tc_view_panal{
  border-style: double; 
  border-width: 20px;
}

body {
   
    font-family: sans-serif;
}
   </style>
</head>
<body style="margin-top: 50px;">
<div class="row" style="margin-top: 50px;">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body tc_view_panal">
        <div class="text-center">
           <h1><b>  Narayani Challenger Convent School</b></h1>
            <h4>Gangapur (Mangari), Varanasi, U.P.-221202</h4>
            <h5>(Recognized By Central Board of Secondery Education, Delhi-110092)</h5>
            <h3><strong class="heade_cc">Transfer Certificate</strong></h3><br>

        </div>
        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 text-center">
          <h4>School No. <strong class=""> 55690</strong>  S.R. No. <strong class=""> {{$t['id']}}</strong> Addmission No. <strong class=""> {{$t->students['id']}}</strong> Affiliation No. <strong class=""> 2132499</strong> Renewed Upto <strong class=""> 2020<br><br></strong> Status of school: <strong class=""> Secondary</strong>
             Registration No of Candidate(in case Class-IX to XII): <strong class=""> {{ $t['reg_no_9_to_12'] }}</strong>
             </h4>
        </div>
        
        <div class="col-xs-12">
        <h4>
          <ol>
            <li>
              Name Of pupil : <strong class="" style="margin-left: 80px;"> {{ $t->students->student_name }}</strong>
            </li><br>
            <li>
              Mother's Name : <strong class="" style="margin-left: 80px;"> {{ $t->students->mother_name }}</strong>
            </li><br>
            <li>
              Father's Name : <strong class="" style="margin-left: 80px;"> {{ $t->students->father_name }}</strong>
            </li><br>
            <li>
              Nationality : <strong class="" style="margin-left: 80px;"> INDIAN</strong>
            </li><br>
            <li>
              Whether the pupil belongs to SC/ST/OBC:  
              <strong class="" style="margin-left: 80px;">
              @if($t->students->castec == 'General')
              @else
               {{$t->students->castec}}
              @endif
              </strong>
            </li><br>
            <li>
              Date of birth according to the Addmission Register(in figure): <strong class="">  {{$t->students->date_of_birth->format('d/m/Y')}}</strong><br>
              (in words):<strong class="" style="margin-left: 80px;"> {{$pday}} {{ $month }}, {{ $pyear }}</strong>
            </li><br>
            <li>
              Whether the pupil failed?:<strong class="" style="margin-left: 80px;"> {{$t['failed']}}</strong>
            </li><br>
             <li>
              Subjects offered:<strong class=""> {{$t['subjects']}}</strong>
            </li><br>
            <li>
              Class in which the last studied(in figure):<strong class="" style="margin-left: 80px;"> {{$t['lclass']}}</strong><br>
              (in words):<strong class="" style="margin-left: 80px;"> {{$lclassword }}</strong>
            </li><br>
            <li>
              /School/Board/ Annual examination last taken with result:<strong class=""> {{$t['lschool']}}</strong>
            </li><br>
            <li>
              Whether qualified for promotion to the next class?:<strong class=""> {{$t['promotion']}}</strong>
            </li><br>
            <li>
             Whether the pupil has paid all due to Vidyalya?<strong class=""> {{$t['paid']}}</strong>
            </li><br>
            <li>
            Whether the pupil was in reciept of any fee concession, if so the  nature of such concession:<strong class=""> {{$t['concession']}}</strong>
            </li><br>
            <li>
            Whether the pupil was is NCC Cadet/Boy Scout/Girl Guide (give details):<strong class=""> {{$t['ncc']}}</strong>
            </li><br>
            <li>
           Date on which pupil's name was struck off the rolls of vidyalya:<strong class=""> {{$t['struck_date']}}</strong>
            </li><br>
            <li>
           Reason for leaving the school:<strong class=""> {{$t['couse']}}</strong>
            </li><br>
            <li>
           No. of meetings upto date:<strong class="" style="margin-left: 80px;"> {{$t['meeting']}}</strong>
            </li><br>
            <li>
           No. of school days the pupil attended:<strong class="" style="margin-left: 80px;"> {{$t['no_days']}}</strong>
            </li><br>
            <li>
           General Conduct:<strong class="" style="margin-left: 80px;"> {{$t['conduct']}}</strong>
            </li><br>
            <li>
           Whether school is under Govt./Minority/Independent Category:<strong class=""> NO</strong>
            </li><br>
            <li>
           Any other remarks:<strong class="" style="margin-left: 80px;"> {{$t['remarks']}}</strong>
            </li><br>
            <li>
           Date of issue of certificate:<strong class="" style="margin-left: 80px;"> {{$t['created_at']->format('d/m/Y')}}</strong>
            </li><br>
          </ol>
          </h4>
        </div>
        
        <div class="col-xs-4" style="margin-top: 100px;">
         <strong style="border-top: solid;">Prepared By
          (Name & Designation)</strong> 
        </div>

        <div class="col-xs-4" style="margin-top: 100px;">
         <strong style="border-top: solid;">
           Checked By
          (Name & Designation)
         </strong>          
        </div>

        <div class="col-xs-4" style=" margin-top: 100px;">
         <strong style="border-top: solid;">
            Sign. of Principal with seal
         </strong>        
        </div>
        <div class="col-xs-12">
          <p>Note:If, This T.C. is issued by the officiating/Incharge Principle, in variably countersigned by the Manager- V.M.C. </p>
        </div>
      
          
    </div>
  </div>
 </div>
</div>
</body>
</html>