<div class="col-md-2">
     <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="{{ route('courses.create') }}">Course</a>
	  <a href="{{ route('sections.create') }}">Section</a>
	  <a href="{{ route('subjects.create') }}">Subject</a>
	  <a href="{{ route('states.create') }}">State</a>
	  <a href="{{ route('stopages.create') }}">Stopage</a>
    </div>
    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Add More</span>
</div>
