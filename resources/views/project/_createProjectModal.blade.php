<!-- Button trigger modal -->
<button type="button" class="btn btn-default modal-trigger" data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">新建项目</h4>
            </div>
            <div class="modal-body">


                {!! Form::open(['route'=>'projects.store','method'=>'POST','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name','项目名称:',['class'=>'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('thumbnail','缩略图:',['class'=>'control-label']) !!}
                    {!! Form::file('thumbnail') !!}
                </div>
                <div class="modal-footer">
                    {!! Form::submit('新建项目',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}

                </div>
                @include('errors/errmssage')
            </div>

        </div>
    </div>
</div>
