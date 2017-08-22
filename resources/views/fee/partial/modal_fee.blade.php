<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Courses
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Courses</h4>
      </div>
      <div class="modal-body" data-spy="scroll" data-target=".table">
        <table class=" table table-bordered  table-hover">
            <thead>
              <tr>
                <th>Serial No.</th>
                <th>Course Name</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0 ?>
             @foreach($courses as $c) 
             <?php $i++ ?>          
              <tr>                 
                  <td>{{ $i }}</td> 
                  <td>{{$c->name}}</td>                             
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