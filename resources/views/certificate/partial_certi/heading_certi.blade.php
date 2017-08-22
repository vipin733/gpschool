<div class="table-responsive text-center">
 <table class=" table table-bordered  table-hover">
            <thead>
              <tr>
                <th class="text-center">Reg. No.</th>
                <th  class="text-center">Student Name</th>
                <th  class="text-center">Father Name</th>
                <th  class="text-center">Mother Name</th>
                <th  class="text-center">Course Name</th>
                <th  class="text-center">View Profile</th>
                <th  class="text-center">Last Transaction</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td>{{ $s->reg_no }}</td>
                  <td><a href="{{ URL::to('/student/' . $s->reg_no) }}">{{ $s->student_name }}</a></td><td>{{ $s->father_name }}
                  </td>
                  <td>{{ $s->mother_name }}</td>
                  <td>{{ $s->courses['name'] }}</td>
                  <td>
                   <div class="text-center">
                    <a class="btn btn-primary" href="{{ URL::to('/student/' . $s->reg_no)}}"><i class="fa fa-eye faa-pulse animated" aria-hidden="true"></i>
                    </a>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                     <a class="btn btn-success" href="{{ URL::to('/student/' . $s->reg_no.'/tution_fee/details') }}"><i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
                     </a>
                    </div>
                  </td>
              </tr>
            </tbody>
  </table>
  </div>