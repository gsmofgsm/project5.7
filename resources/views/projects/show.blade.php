@extends('layout')

@section('content')
    <h1 class="title">{{ $project->title }}</h1>
    <div class="content">
        {{ $project->description }}

        <p>
            <a href="/projects/{{$project->id}}/edit">Edit</a>
        </p>
    </div>

    @if($project->tasks->count())

        <div class="box">

            @foreach($project->tasks as $task)
                <div>
                    <form action="/tasks/{{ $task->id }}" method="POST">

                        @method('PATCH')
                        @csrf

                        <label for="completed" class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
                            <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            {{ $task->description }}
                        </label>
                    </form>
                </div>

            @endforeach

        </div>

        @foreach($errors->all() as $error)
            {{ $error }}

            @endforeach

    @endif

    {{-- add a new task form --}}
    <form action="/projects/{{ $project->id }}/tasks" method="POST" class="box">

        @csrf
        
        <div class="field">
                    
            <label class="label" for="">New task</label>
        
            <div class="control">
        
                <input type="text" class="input" name="description" placeholder="New Task" value="">
        
            </div>
        
        </div>

        <div class="field">

            <div class="control">

                <button type="submit" class="button is-link" id="" name="">Add Task</button>

            </div>

        </div>

    </form>

@endsection