<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 <i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tution Fee Structure({{ $activesessionid['name'] }})</h4>
      </div>
      <div class="modal-body">
        <table class=" table table-bordered  table-hover">
            <thead>
              <tr>
                <th class="text-center">Serial No.</th>
                <th class="text-center">Course Name</th>
                <th class="text-center">Tution Fee</th>
                <th class="text-center">Late Fee</th>
                <th class="text-center">Other Fee</th>
                <th class="text-center">Description</th>
              </tr>
            </thead>
          <tbody class="text-center">
              <?php $i = 0 ?>
            @foreach($tutionfees as $tutionfee)
                <?php $i++ ?>
              <tr>
                  <td>{{$i}}</td>
                  <td>{{ $tutionfee->courses['name'] }}</td>
                  <td>
                  <i class="fa fa-inr" aria-hidden="true"></i>  {{ $tutionfee['tution_fee'] }}
                  </td>
                  <td>
                  <i class="fa fa-inr" aria-hidden="true"></i> 
                  @if($tutionfee['late_fee'])
                  {{ $tutionfee['late_fee'] }}
                  @else
                  0
                  @endif
                  </td>
                  <td>
                  <i class="fa fa-inr" aria-hidden="true"></i>
                  @if($tutionfee['other_fee'])
                  {{ $tutionfee['other_fee'] }}
                  @else
                  0
                  @endif
                  </td>
                  <td>
                    @if($tutionfee['remarks'])
                    {{ $tutionfee['remarks'] }}
                    @else
                    Monthly
                    @endif
                  </td>
              </tr>
             @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
