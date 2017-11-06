@extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">
    <div class="container col-md-4">
        <canvas id="pieChart" width="300" height="300" data-todo={{ $toDoCount }} data-done={{ $doneCount }} data-total={{ $total }}></canvas>
    </div>
    <div class="container col-md-4">
        <canvas id="barChart" width="300" height="300"></canvas>
        <div id="bar-data"  data-names= {!! json_encode($names,JSON_UNESCAPED_UNICODE) !!}
                data-counts= {!! json_encode(TasksCountArray($projects)) !!}></div>
    </div>
    <div class="container col-md-4">
        <canvas id="radarChart" width="300" height="300"></canvas>

    </div>

    </div>
    @section('js')
        <script src="{{ asset('js/Chart.js') }}"></script>
        <script>
            $(document).ready(function () {
                var ctx = $('#radarChart');

                var data = {
                    labels:['任务总数','未完成','完成的'],
                    datasets:[
                        <?php
                            $i = 0;
                            foreach($projects as $project) :
                            $name = $project->name;
                            $totalPP = $project->tasks()->count();
                            $toDoPP = $project->tasks()->where('completed',0)->count();
                            $donePP = $project->tasks()->where('completed',1)->count();
                            echo "{";

                            ?>

                    label:"<?php echo $name ?>",
                    backdropColor:"{{rand_color()}}",
                    borderColor:"{{rand_color()}}",
                    pointBackgroundColor:"{{rand_color()}}",
                    pointBorderColor:"#fff",
                    pointHoverBackgroundColor:"#fff",
                    pointHoverBorderColor:"{{rand_color()}}",
                    data:[<?php echo $totalPP.','.$totalPP.','.$donePP ?>]

                <?php
                ($i+1) == $projects->count() ? print '}' : print '},';
                $i++;
                endforeach;
                ?>
                ]
            };


                var myRadarChart = new Chart(ctx,{
                    type:'radar',
                    data:data,
                    options:{
                        responsive:true,
                        title:{
                            display:true,
                            text:"项目之间的任务完成情况",
                        },
                        legend:{
                            display:true,
                            position:"bottom"
                        }
                    }
                });
            });
        </script>

    @endsection
@endsection