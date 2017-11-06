<?php
if(! function_exists('user')){

    /**
     * @param null $driver
     * @return mixed
     */
    function user($driver = null){
        if($driver){
            return app('auth')->guard($driver)->user();
        }
        return app('auth')->user();
    }
}

function tasksCountArray($projects){
    $Counts = [];
    foreach ($projects as $project){
        $perCount = $project->tasks->count();

        array_push($Counts, $perCount);
    }
    return $Counts;
}

function rand_color(){
    $R = rand(0,255);
    $G = rand(0,255);
    $B = rand(0,255);
    return 'rgba('.$R.','.$G.','.$B.',0.5)';
}