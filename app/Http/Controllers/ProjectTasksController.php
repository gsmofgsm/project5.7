<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
        $completed = request()->has('completed');

        $task->update([
            'completed' => $completed
        ]);

        return back();
    }
}
