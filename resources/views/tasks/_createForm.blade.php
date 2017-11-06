@if($errors->has('name'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('name') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif
{!! Form::open(['class'=>'form-inline','route'=>['tasks.store','project'=>$project->first()->id]]) !!}
<td class="date-cell"></td>
<td class="first-cell">
    {!! Form::text('name',null,['placeholder'=>'有什么要完成的任务','class'=>'form-control']) !!}
</td>
    {{--  {!! Form::hidden('project',$project->first()->id) !!}--}}
<td class="icon-cell">
    <button tyle="submit" class="btn btn-success">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </button>
</td>
{!! Form::close() !!}