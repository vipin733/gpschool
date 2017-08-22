@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

<div class="row">




  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-primary btn-block">Search Teachers</button>
      </div>
      <div class="panel-body">
        <div class="table-responsive text-center">
          <table class=" table table-bordered  table-hover" id="sessions_teachers">
            <thead>
              <tr>
                <th class="text-center">Serial No.</th>
                <th class="text-center">Created at</th>
                <th class="text-center">Date of Joining</th>
                <th class="text-center">Reg. No.</th>
                <th class="text-center">Teacher Name</th>
                <th class="text-center">Status</th>
                <th class="text-center">Transportation Taken</th>
                <th class="text-center">Father Name</th>
                <th class="text-center">Mother Name</th>
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

   var oTable = $('#sessions_teachers').DataTable({
     processing: true,
     serverSide: true,
     dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'print'
          ],
        processing: true,
        serverSide: true,
        ajax: {
            url: '/search/all_teachers/ajax',
            data: function (d) {
              
              
                
            }
        },

        columns: [
                     { data: 'Serial_No', name: 'Serial_No' , orderable: false, searchable: false},
                      { data: 'created_at', name: 'created_at' },
                      { data: 'date_of_joining', name: 'date_of_joining' },
                      { data: 'reg_no', name: 'reg_no' },                     
                      {data: 'teacher_name', name: 'teacher_name'},
                      {data: 'status', name: 'status'},
                      {data: 'transportation', name: 'transportation'},
                      { data: 'father_name', name: 'father_name' },
                      { data: 'mother_name', name: 'students.mother_name' },
                      {data: 'profile', name: 'profile', orderable: false, searchable: false},

        ]
    });

    $('#search-formfff').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
</script>


@stop