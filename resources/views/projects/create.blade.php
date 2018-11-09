@extends('layout')

@section('content')
<h1>Create a New Project</h1>

<form action="/projects" method="POST">

    @csrf

    <div class="field">
        <div class="control">
            <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Project title" value="{{ old('title') }}">
        </div>
    </div>

    <div class="field">
        <div class="control">
            <textarea name="description" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" id="description" cols="30" rows="10" placeholder="Project description">{{ old('description') }}</textarea>
        </div>
    </div>

    <div class="field">

        <div class="control">

            <button type="submit" class="button is-link" id="" name="">Create Project</button>

        </div>

    </div>


    @include('errors')
</form>

@endsection