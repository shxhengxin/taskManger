{!! Form::open(['route'=>['projects.destroy',$project->id],'method'=>'DELETE']) !!}
<button type="submit" class="btn">
    <li class="glyphicon glyphicon-remove"></li>
</button>
{!! Form::close() !!}