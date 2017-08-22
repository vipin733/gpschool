@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

<div class="row">


  <div class="col-md-12 text-center">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-primary btn-block">
          <b>Search Students</b>
        </button>
      </div>  
      <div class="panel-body">
        <form action="" method="post" class="form-inline" id="search-formfff">

            <div class="form-group">
              <select  id="course" class="form-control" name="course">
                <option value="">---Select Class</option>
               @foreach($courses as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <select  id="section" class="form-control" name="section">
                <option value="">---Select Section</option>
               @foreach($sections as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>

             <div class="form-group">
               <select  id="session" class="form-control" name="session" >
                <option value="">---Select Session</option>
               @foreach($asessions as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div> 
           <div class="form-group">
             <button class="btn btn-primary" type="submit">Submit</button>
             <a href="" class="btn btn-warning">Refresh</a>
           </div>
        </form>
      </div>
    </div>      
  </div>

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-primary btn-block">Search Students</button>
      </div>
      <div class="panel-body">
        <div class="table-responsive text-center">
          <table class=" table table-bordered  table-hover" id="sessions_students">
            <thead>
              <tr>
                <th class="text-center">Serial No.</th>
                <th class="text-center">Student Name</th>
                <th class="text-center">Reg. No.</th>
                <th class="text-center">Course</th>
                <th class="text-center">Section</th>
                <th class="text-center">Session</th>
                <th class="text-center">Father Name</th>
                <th class="text-center">Mother Name</th>
                <th class="text-center">Status</th>
                <th class="text-center">View Profile</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>  
        </div>
      </div>  
    </div>
  </div> 

</div>

@stop


@section('script')
   

<script src="/vendor/datatables/buttons.server-side.js"></script>
<script type="text/javascript">
   var oTable = $('#sessions_students').DataTable({
     processing: true,
     serverSide: true,
     dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'print'
          ],
        processing: true,
        serverSide: true,
        ajax: {
            url: '/search/all_students/ajax',
            data: function (d) {

                d.course = $('select[name=course]').val();
                d.section = $('select[name=section]').val();
                d.session = $('select[name=session]').val();
               

            }
        },

        columns: [
                     { data: 'Serial_No', name: 'Serial_No' , orderable: false, searchable: false},
                      { data: 'students.student_name', name: 'students.student_name' },
                      { data: 'students.reg_no', name: 'students.reg_no' },
                      {data: 'courses.name', name: 'courses.name'},
                      {data: 'sections.name', name: 'sections.name'},
                      {data: 'asessions.name', name: 'asessions.name'},
                      { data: 'students.father_name', name: 'students.father_name' },
                      { data: 'students.mother_name', name: 'students.mother_name' },
                       {data: 'status', name: 'status', orderable: false, searchable: false},
                      {data: 'profile', name: 'profile', orderable: false, searchable: false},

        ]
    });

    $('#search-formfff').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
</script>


@stop
