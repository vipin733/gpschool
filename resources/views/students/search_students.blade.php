@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

<div class="row">


  <div class="col-md-12 text-center" id="sandbox-container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-primary btn-block">
          <b>Search Students</b>
        </button>
      </div>  
      <div class="panel-body">
        <form action="" method="post" class="form-inline" id="search-formfff">

            <div class="input-daterange form-group  input-group" id="datepicker">
              <input type="text" class="input-sm form-control" name="start_at" id="start_at" />
              <span class="input-group-addon">to</span>
              <input type="text" class="input-sm form-control" name="end_at" id="end_at"/>
           </div>

            <div class="form-group">
              <select  id="addmission_course" class="form-control" name="addmission_course">
                <option value="">---Select Addmission Course</option>
               @foreach($courses as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>

             <div class="form-group">
               <select  id="current_course" class="form-control" name="current_course" >
                <option value="">---Select Current Course</option>
               @foreach($courses as $key=>$value)
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
                <th class="text-center">Created at</th>
                <th class="text-center">Reg. No.</th>
                <th class="text-center">Student Name</th>
                <th class="text-center">Course Addmission</th>
                <th class="text-center">Current Course</th>
                <th class="text-center">Father Name</th>
                <th class="text-center">Mother Name</th>
                <th class="text-center">Status</th>
                <th class="text-center">View Profile</th>
                <th class="text-center">Last Transactions</th>
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
<script src="/js/bootstrap-datepicker.min.js"></script>
  @include('partial.date_range_picker')

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
            url: '/all-students/ajax',
            data: function (d) {
              
                 d.start_at          = $('input[name=start_at]').val();
                d.end_at            = $('input[name=end_at]').val();
                d.addmission_course = $('select[name=addmission_course]').val();
                d.current_course    = $('select[name=current_course]').val();
                
               

            }
        },

        columns: [
                     { data: 'Serial_No', name: 'Serial_No' , orderable: false, searchable: false},
                      { data: 'created_at', name: 'created_at' },
                      { data: 'student_name', name: 'student_name' },
                      { data: 'reg_no', name: 'reg_no' },                     
                      {data: 'created_courses.name', name: 'created_courses.name'},
                      {data: 'courses.name', name: 'courses.name'},
                      { data: 'father_name', name: 'father_name' },
                      { data: 'mother_name', name: 'students.mother_name' },
                       {data: 'status', name: 'status', orderable: false, searchable: false},
                      {data: 'profile', name: 'profile', orderable: false, searchable: false},
                      {data: 'details_tutuion_fee', name: 'details_tutuion_fee', orderable: false, searchable: false},

        ]
    });

    $('#search-formfff').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
</script>


@stop
