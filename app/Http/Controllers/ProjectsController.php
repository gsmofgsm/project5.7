<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->isAdmin()){
            $projects = Project::all();
        }else {
            $projects = auth()->user()->projecs;
        }
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3'],
        ]);

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        \Mail::to('gsmofgsm@hotmail.com')->send(new ProjectCreated($project));

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
