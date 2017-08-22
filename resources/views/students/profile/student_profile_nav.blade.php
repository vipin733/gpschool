
     <div id="ddmySidenav" class="ddsidenav">
      <a href="javascript:void(0)" class="ccclosebtn" onclick="closeNav()">&times;</a>
      <a href="{{ URL::to('/student/' . $student->reg_no.'/tution_fee/details') }}">Last Tution Transcations</a>
      @if(count($student->transportfeecollections))
      <a href="{{ URL::to('/student/' . $student->reg_no.'/transport_fee/details') }}">Last Transport Transcations</a>
      @endif
      <a href="{{ URL::to('/student/' . $student->reg_no.'/registration_fee/details') }}">Last Registration Transcations</a>
         @if( $student->status == 1 )
        <a href="/student/{{$student->reg_no}}/tution_fee/take">Pay Tution Fee</a>
        @if($student->transportation == 1)
       <a href="/student/{{$student->reg_no}}/transport_fee/take">Pay Transport Fee</a>
       @endif
        <a href="/student/{{$student->reg_no}}/registration_fee/take">Pay Registration Fee</a>
      @endif
      <a href="{{ URL::to('/acadmic/' . $student->reg_no.'/c_c_view') }}">Char. Cert.</a>
      <a href="{{ URL::to('/acadmic/' . $student->reg_no.'/t_c_view') }}">T.C.</a>
    </div>
    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; View</span>

