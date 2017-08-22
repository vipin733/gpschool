{{ Form::model($registraionfee, ['method' => 'patch', 'route' => ['registration.destroy',$registraionfee->id], 'class' =>'form-inline form-delete','style'=>'display: inline;']) }}
{{Form::hidden('id', $registraionfee->id)}}
<button type="submit" name="delete_modal" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i>
</button>
{{Form::close()}}
@include('add.destroy_modal')