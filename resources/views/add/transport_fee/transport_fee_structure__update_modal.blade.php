<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#cu{{$fee->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="cu{{$fee->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update transportfee fee</h4>
      </div>
      <div class="modal-body">
          
        <form method="POST" action="{{ route('transports.update',$fee->id) }}" data-parsley-validate ="">
        {{ csrf_field() }} {{ method_field('PATCH') }}

           <div class="form-group">
                  <label for="transport_fee">Transport Fee (Monthely)</label>
                  <input type="text" class="form-control" id="transport_fee" name="transport_fee" value="{{ old('transport_fee', $fee->transport_fee) }}" placeholder="Fee" required="" data-parsley-type="number">
                </div>

                <div class="form-group">
                  <label for="late_fee">Late Fee</label>
                  <input type="text" class="form-control" id="late_fee" name="late_fee" value="{{ old('late_fee',$fee->late_fee) }}" placeholder="Late Fee" data-parsley-type="number">
                </div>

                <div class="form-group">
                  <label for="other_fee">Other Fee</label>
                  <input type="text" class="form-control" id="other_fee" name="other_fee" value="{{ old('other_fee',$fee->other_fee) }}" placeholder="Other Fee" data-parsley-type="number">
                </div>

                <div class="form-group">
                 <label for="remarks">Description</label>
                 <textarea class="form-control" rows="3" name="remarks" >{{ old('remarks',$fee->remarks) }}</textarea>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus faa-flash animated" aria-hidden="true"></i> Update Transport Fee</button>
                </div>
         
        </form>    
       
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



