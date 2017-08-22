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
              <select  id="stopage" class="form-control" name="stopage">
                <option value="">---Select Stopage</option>
               @foreach($stopages as $key=>$value)
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
          <table class=" table table-bordered  table-hover" id="stopage_students">
            <thead>
              <tr>
                <th class="text-center">Serial No.</th>
                <th class="text-center">Student Name</th>
                <th class="text-center">Reg. No.</th>
                <th class="text-center">Course</th>
                <th class="text-center">Stopage</th>
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
   var oTable = $('#stopage_students').DataTable({
     processing: true,
     serverSide: true,
     dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'print'
          ],
        processing: true,
        serverSide: true,
        ajax: {
            url: '/search/all_students/stopage_wise/ajax',
            data: function (d) {

                d.course   = $('select[name=course]').val();
                d.stopage = $('select[name=stopage]').val();
               

            }
        },

        columns: [
                      { data: 'Serial_No', name: 'Serial_No' , orderable: false, searchable: false},
                      { data: 'student_name', name: 'student_name' },
                      { data: 'reg_no', name: 'reg_no' },
                      { data: 'courses.name', name: 'courses.name'},                     
                      { data: 'stopages.name', name: 'stopages.name'},
                      { data: 'father_name', name: 'father_name' },
                      { data: 'mother_name', name: 'mother_name' },
                      { data: 'profile', name: 'profile', orderable: false, searchable: false},

        ]
    });

    $('#search-formfff').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
</script>


@stop
