@extends('layouts.app')

@section('content')
    <h1>My Projects</h1>
    <a href="projects/create">Create a new Project!</a>
    <ul>
    @forelse ($projects as $project)
            <li><a href="{{ $project->path() }}">{{ $project->title }}</a></li>
    @empty
        <p>There are no projects yet.</p>
    @endforelse
    </ul>
@endsection
