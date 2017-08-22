@extends('welcome')
@section('nav')
@include('layouts.nav')
@stop
@section('content')
    <div class="row">
    <div class="col-sm-4">
    @if(count($teachers))
      <h3>Total Teachers: <strong>{{$teachers->total()}}</strong></h3>
      @else
      @endif
     </div>
     <div class="col-sm-12">
     <a class="btn btn-primary pull-right" href="/search/all_students"><i class="fa fa-search faa-pulse animated" aria-hidden="true"></i> Search Students</a>
     <a class="btn btn-default pull-right" href="/search/all_teachers"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Refresh</a>
         <h2>Teacher Information</h2>
         <div class="form-group">
            <!-- <input type="text" name="teachersearch" class="form-control" id="teachersearch" placeholder="Search Teacher">  -->
            <form  method="get">
              <input name="query" class="form-control" placeholder="Search...">
            </form>

          </div>
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>

              <tr>
                <th>Serial No.</th>
                <th>Teacher Name</th>
                <th>Reg. No.</th>

                <th>Father Name</th>
                <th>Mother Name</th>
                <th>View Profile</th>


              </tr>
            </thead>
            <tbody>
            <?php $i = 0 ?>
             @foreach($teachers as $s)
              <?php $i++ ?>
              @if($s->status == 1)
              <tr class="success">

                  <td>{{ $i }}</td>
                  <td><a href="{{ URL::to('/teacher/' . $s->reg_no) }}">{{ $s->teacher_name  }}</a></td>
                  <td>{{ $s->reg_no }}</td>

                  <td>{{ $s->father_name }}</td>
                  <td>{{ $s->mother_name }}</td>
                  <td>
                    <div class="text-center">
                    <a class="btn btn-primary" href="{{ URL::to('/teacher/' . $s->reg_no) }}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>
                   </div>
                  </td>

              </tr>
              @else
              <tr class="danger">

                  <td>{{ $i }}</td>
                  <td><a href="{{ URL::to('/teacher/' . $s->reg_no) }}">{{ $s->teacher_name  }}</a></td>
                  <td>{{ $s->reg_no }}</td>

                  <td>{{ $s->father_name }}</td>
                  <td>{{ $s->mother_name }}</td>
                  <td>
                    <div class="text-center">
                    <a class="btn btn-primary" href="{{ URL::to('/teacher/' . $s->reg_no) }}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i></a>
                   </div>
                  </td>

              </tr>
             @endif
            @endforeach
            </tbody>

           </table>
         </div>
      </div>
</div>

{{ $teachers->appends(request()->only(['query']))->links() }}

@stop
