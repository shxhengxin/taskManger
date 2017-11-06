<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Repositories\ProjectsRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    protected $project;

    /**
     * ProjectController constructor.
     * @param $project
     */
    public function __construct(ProjectsRepository $project)
    {
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $this->project->store($request);
        flash('创建成功')->success();
        return Redirect::back();

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Carbon::createFromDate(1990,10,25)->age;
        $project = user()->projects()->where('id',$id)->get();
        if(!($project->first())){
            flash('数据不存在')->error();
            return Redirect::back();
        }
        //未完成的任务
        $toDo = $this->project->toDo($project);
        //已处理的任务
        $Done = $this->project->toDo($project,1);
        $projects = $this->project->projectList();
        return view('project.show',compact('project','toDo','Done','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param EditProjectRequest $request
     * @param $id
     * @return mixed
     */
    public function update(EditProjectRequest $request, $id)
    {
        $this->project->updateProject($request,$id);
        flash('更新成功')->success();
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->project->destroy($id);
        flash('删除成功')->success();
        return Redirect::back();
    }
}
