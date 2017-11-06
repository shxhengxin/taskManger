{!! Form::open(['route'=>['tasks.destroy',$task->id],'method'=>'DELETE']) !!}
<button type="submit" class="btn btn-danger btn-sm">
    <li class="glyphicon glyphicon-remove"></li>
</button>
{!! Form::close() !!}