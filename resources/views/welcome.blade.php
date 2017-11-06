@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($projects)
                @foreach($projects as $project)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <ul class="icon-bar">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#EditModal-{{$project->id}}">
                                    <li class="glyphicon glyphicon-cog"></li>
                                </button>
                                @include('project/_DeleteFormProject')
                            </ul>

                            <a href="{{ route('projects.show',$project->id) }}">
                                <img src="/thumbnails/{{ $project->thumbnail ? $project->thumbnail : 'flower.jpg' }}" alt="{{ $project->name }}">
                            </a>
                            <div class="caption">
                                <a href="{{ route('projects.show',$project->id) }}">
                                    <h4 class="text-center">{{ $project->name }}</h4>
                                </a>
                            </div>
                        </div>

                        @include('project/_EditProjectModal')
                    </div>


                    @endforeach

                @endif
            <div class="project-modal col-sm-6 col-md-3">
               @include('project/_createProjectModal')
            </div>
        </div>
    </div>
    @section('js')
        <script>
            $(document).ready(function(){
               $(".icon-bar").hide();
               $('.thumbnail').hover(function(){
                    $(this).find(".icon-bar").toggle();
               });
            });
        </script>
    @endsection
@endsection