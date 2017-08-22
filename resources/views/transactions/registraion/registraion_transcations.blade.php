@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')

<div class="row">

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
         <button class="btn btn-primary btn-block">
            Total registraion fee collection({{ $asession['name'] }})
         </button>
        </div>
        <div class="panel-body">
          <h1 class="text-center"><i class="fa fa-inr" aria-hidden="true"></i>  {{ $total }}</h1>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
         <button class="btn btn-primary btn-block">
            Search registraion fee transaction({{ $asession['name'] }})
         </button>
        </div>
        <div class="panel-body">
          <div class="text-center"  id="sandbox-container">
            <form method="" id="search-formfff" role="form">
              <div class="input-daterange form-group input-group" id="datepicker">
                <span class="input-group-addon">From</span>
                <input type="text" class="input-sm form-control" id="start_at" name="start_at">
                <span class="input-group-addon">to</span>
                <input type="text" class="input-sm form-control" id="end_at" name="end_at">
              </div>

              <div class="form-group">
                <select  id="course" class="form-control" name="course" >
                      <option value="">---Select Course</option>
                     @foreach($courses as $key=>$value)
                      <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                </select>
              </div>
              <div class="form-group">
                  <button type="submit" class=" btn btn-primary"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i> Search</button>
              </div>   
            </form>
          </div>
        </div>
      </div>     
    </div>

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <button class="btn btn-primary btn-block">
            All registration fee transaction({{ $asession['name'] }})
          </button>
        </div>
        <div class="panel-body">
 	        <div class="table-responsive text-center">
            <table class=" table table-bordered  table-hover" id="registration_fee">
              <thead>
                <tr>
                  <th class="text-center col-sm-1">Serial No.</th>
                  <th class="text-center col-sm-2"">Reg. No.</th>
                  <th class="text-center">Course</th>
                  <th class="text-center col-sm-1"">Date</th>
                  <th class="text-center">Registration Fee</th>
                  <th class="text-center">Late Fee</th>
                  <th class="text-center col-sm-1"">Total</th>
                  <th class="text-center col-sm-2"">Remarks</th>
                  <th class="text-center col-sm-1"">View</th>
                  <th class="text-center col-sm-1"">Print</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection

@section('script')
 

    <script src="/js/bootstrap-datepicker.min.js"></script>
   @include('partial.date_range_picker')
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script type="text/javascript">
   var oTable = $('#registration_fee').DataTable({
     processing: true,
     serverSide: true,
     dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'print'
          ],
        processing: true,
        serverSide: true,
        ajax: {
            url: '/acadmic/transactions/registration/ajax',
            data: function (d) {
               d.start_at = $('input[name=start_at]').val();
               d.end_at = $('input[name=end_at]').val();
               d.course = $('select[name=course]').val();
               

            }
        },

        columns: [
                      { data: 'Serial_No', name: 'Serial_No' , orderable: false, searchable: false},
                      { data: 'students.reg_no', name: 'students.reg_no' },
                      {data: 'courses.name', name: 'courses.name'},
                      { data: 'created_at', name: 'created_at' },
                      { data: 'registraion_fee', name: 'registraion_fee' },
                      { data: 'late_fee', name: 'late_fee' },
                      {data: 'total', name: 'total', orderable: false, searchable: false},
                      { data: 'remarks', name: 'remarks' },
                      {data: 'view_registraion_fee', name: 'view_registraion_fee', orderable: false, searchable: false},
                      {data: 'print_registraion_fee', name: 'print_registraion_fee', orderable: false, searchable: false},


        ]
    });

    $('#search-formfff').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });

  
</script>


@stop
