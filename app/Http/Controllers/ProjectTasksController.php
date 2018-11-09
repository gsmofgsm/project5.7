<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required']);

        $project->addTask($attributes);

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
