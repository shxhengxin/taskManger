{!! Form::open(['route'=>['tasks.check',$task->id],'method'=>'POST']) !!}

<button type="submit" class="btn btn-success btn-sm">
    <i class="glyphicon glyphicon-ok"></i>
</button>
{!! Form::close() !!}