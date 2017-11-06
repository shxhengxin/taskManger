<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTasksRequest;
use App\Http\Requests\EditTasksRequest;
use App\Repositories\ProjectsRepository;
use App\Repositories\TasksRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TasksController extends Controller
{
    protected $task;
    protected $project;

    /**
     * TasksController constructor.
     * @param $task
     */
    public function __construct(TasksRepository $task, ProjectsRepository $project)
    {
        $this->task = $task;
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toDo = $this->task->index(0);
        $Done = $this->task->index(1);
        $projects = $this->project->projectList();
        return view('tasks.index', compact('toDo', 'Done', 'projects'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTasksRequest $request)
    {
        $task = $this->task->CreateTask($request);
        flash('创建任务成功')->success();
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTasksRequest $request, $id)
    {
        $this->task->update($request, $id);
        flash('更新任务成功')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->task->destroy($id);
        flash('删除任务成功')->success();
        return back();
    }

    public function check($id)
    {
        $this->task->check($id);
        return Redirect::back();
    }

    /**
     * 图表统计
     * @param $id
     */
    public function charts()
    {
        $total = $this->task->total();
        $doneCount = $this->task->doneCount();
        $toDoCount = $this->task->toDoCount();
        $names = $this->project->getProjectName();
        $projects = $this->project->getProjectTasks();

        return view('tasks.charts', compact('total', 'doneCount', 'toDoCount','names','projects'));
    }
}
