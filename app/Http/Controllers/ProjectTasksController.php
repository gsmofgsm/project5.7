<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $project->addTask(request('description'));

//        Task::create([
//            'project_id' => $project->id,
//            'description' => request('description')
//        ]);

        return back();
    }

    public function update(Task $task)
    {
        $completed = request()->has('completed');

        $task->update([
            'completed' => $completed
        ]);

        return back();
    }
}
