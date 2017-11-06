<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26 0026
 * Time: 下午 7:12
 */

namespace App\Http\ViewComposers;


use App\Repositories\TasksRepository;
use Illuminate\View\View;

class TaskCountComposer
{
    protected $task;

    /**
     * TaskCountComposer constructor.
     * @param $task
     */
    public function __construct(TasksRepository $task)
    {
        $this->task = $task;
    }

    public function compose(View $view)
    {
        $view->with([
            'total' => $this->task->total(),
            'toDoCount' => $this->task->toDoCount(),
            'doneCount' => $this->task->doneCount(),
        ]);
    }
}