<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/25 0025
 * Time: 下午 8:22
 */

namespace App\Repositories;


use App\Models\Project;
use Intervention\Image\Facades\Image;

class ProjectsRepository
{


    public function store($res)
    {
        return  user()->projects()->create([
            'name' => $res->name,
            'thumbnail' => $this->thumbnail($res)
        ]);
    }

    public function destroy($id)
    {
        return Project::find($id)->delete();
    }

    public function updateProject($request,$id)
    {
       $project =  Project::findOrFail($id);

       $project->name = $request->get('name');
       if($request->hasFile('thumbnail')){
           $project->thumbnail = $this->thumbnail($request);
       }
       $project->save();
    }

    public function toDo($project,$value=0)
    {
        return $project->first()->tasks()->where('completed',$value)->get();
    }

    public function projectList()
    {
        return Project::pluck('name','id');
    }

    public function getProjectName()
    {
        return Project::pluck('name');
    }

    public function getProjectTasks()
    {
        return Project::with('tasks')->get();
    }

    private function thumbnail($res)
    {
        if($res->hasFile('thumbnail')){
            $file = $res->thumbnail;
            $name = str_random(10).'.jpg';
            $path = public_path().'/thumbnails/'.$name;
            Image::make($file)->resize(261.98)->save($path);
            return $name;
        }
    }
}