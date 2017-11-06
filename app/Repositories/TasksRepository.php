<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26 0026
 * Time: 上午 12:22
 */

namespace App\Repositories;


use App\Models\Task;

class TasksRepository
{

    public function index($value)
    {
        return user()->tasks()->where('completed',$value)->paginate(15);
    }

    public function CreateTask($res)
    {
       return  Task::create([
            'title'=> $res->name,
            'project_id' =>$res->project
        ]);
    }

    public function check($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = 1;
        $task->save();
    }

    public function update($res,$id)
    {
        $task = Task::findOrFail($id);
        $task->title = $res->title;
        $task->project_id = $res->projectList;
        $task->save();

    }

    public function destroy($id)
    {
        Task::destroy($id);
    }

    public function total()
    {
        return Task::count();
    }

    public function doneCount()
    {
        return Task::where('completed',1)->count();
    }

    public function toDoCount()
    {
        return Task::where('completed',0)->count();
    }




}