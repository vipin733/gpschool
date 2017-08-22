<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/home">GRAMYANCHAL</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="/home"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        
       @if(Auth::user()->email == 'admin@gramyanchal.com')
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"><i class="fa fa-align-justify" aria-hidden="true"></i> Delete Fee <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li>
               <a href="/acadmic/delete/transactions/tution"><i class="fa fa-ban" aria-hidden="true"></i> Delete Tution Fee</a>
            </li>
            <li>
               <a href="/acadmic/delete/transactions/transport"><i class="fa fa-ban" aria-hidden="true"></i> Delete Transport Fee </a>
            </li>
            <li>
               <a href="/acadmic/delete/transactions/registration"><i class="fa fa-ban" aria-hidden="true"></i> Delete Registration Fee</a>
            </li>
          </ul>
        </li>

        @endif

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"><i class="fa fa-align-justify" aria-hidden="true"></i> Acadmic <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
               <a href="/create-students"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Register Student</a>
            </li>

            <li>
               <a href="/create-teachers"><i class="fa fa-user-plus" aria-hidden="true"></i> Register Teacher/Staff</a>
            </li>
            <li>
               <a href="/search/unpaid/students/tution"><i class="fa fa-ban" aria-hidden="true"></i> Unpaid Tution Fee Students</a>
            </li>
            <li>
               <a href="/search/unpaid/students/transport"><i class="fa fa-ban" aria-hidden="true"></i> Unpaid Transport Fee Students</a>
            </li>
            <li>
               <a href="/search/unpaid/students/registration"><i class="fa fa-ban" aria-hidden="true"></i> Unpaid Registration Fee Students</a>
            </li>
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"><i class="fa fa-align-justify" aria-hidden="true"></i> Add <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li>
               <a href="{{ route('registrations.create') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Registration Fee  Structure</a>
            </li>

            <li>
               <a href="{{ route('tutions.create') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Tution Fee  Structure</a>
            </li>
            <li>
               <a href="{{ route('transports.create') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Transport Fee  Structure</a>
            </li>
            <li>
             <a href="{{ route('asessions.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Session</a>
            </li>
            <li>
              <a href="{{ route('courses.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Course</a>
            </li>
             <li>
                 <a href="{{ route('sections.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Section</a>
             </li>
             <li>
                 <a href="{{ route('subjects.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Subject</a>
             </li>
             <li>
                 <a href="{{ route('busdetails.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Bus Details</a>
             </li>
             <li>
                 <a href="{{ route('stopages.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Stopage</a>
             </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"><i class="fa fa-align-justify" aria-hidden="true"></i> More <span class="caret"></span></a>
          <ul class="dropdown-menu">
           {{--  <li>
              <a href="/analysis/bar"><i class="fa fa-bar-chart" aria-hidden="true"></i> Analysis</a>
            </li> --}}

            <li>
              <a href="/acadmic/transactions/registration"><i class="fa fa-bar-chart" aria-hidden="true"></i> Registration Fee Transactions</a>
            </li>
            <li>
              <a href="/acadmic/transactions/tution"><i class="fa fa-bar-chart" aria-hidden="true"></i> Tution Fee Transactions</a>
            </li>
            <li>
              <a href="/acadmic/transactions/transport"><i class="fa fa-bar-chart" aria-hidden="true"></i> Transport Fee Transactions</a>
            </li>
            <li>
              <a href="/search/all_students"><i class="fa fa-search" aria-hidden="true"></i> Search Class wise</a>
            </li>
            <li>
              <a href="/search/all_students/stopage_wise"><i class="fa fa-search" aria-hidden="true"></i> Search Stopage wise</a>
            </li>
              <li role="separator" class="divider"></li>
              <li><a href="/all-students"><i class="fa fa-search" aria-hidden="true"></i> Students</a></li>
              <li><a href="/search/all_teachers"><i class="fa fa-search" aria-hidden="true"></i> Teachers/Staff</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>
                      Logout
          </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
          </form>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
