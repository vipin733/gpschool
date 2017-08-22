<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 <i class="fa fa-eye fa-lg faa-pulse animated" aria-hidden="true"></i>
</button>
 -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Teacher Profile Pic.</h4>
      </div>
      <div class="modal-body">
        <div class="row">
         <div class="col-md-10 col-md-offset-1">
           <form method="POST" class="form-inline" enctype="multipart/form-data" action="/teacher/{{ $teacher->reg_no }}/avatar">
           {{ csrf_field() }} {{ method_field('PATCH') }}
              <div class="form-group">       
              <input name="avatar" class="form-control" type="file"/> 
              </div>
              <div class="form-group"> 
               <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div> 
            </form>   
          </div> 
         </div>     
      </div>
      <div class="modal-footer">       
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div>
      </div>
  </div>
</div>

