{{ Form::model($fee, ['method' => 'delete', 'route' => ['tutions.destroy',$fee->id], 'class' =>'form-inline form-delete','style'=>'display: inline;']) }}
{{Form::hidden('id', $fee->id)}}
<button type="submit" name="delete_modal" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i>
</button>
{{Form::close()}}
@include('add.destroy_modal')