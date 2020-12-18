@extends('layouts.app')

@section('content')
    <h1>Other Projects</h1>
    @forelse ($projects as $project)
            <li><a href="projects/{{ $project->id }}">{{ $project->title }}</a></li>
    @empty
        <p>There are no projects yet.</p>
    @endforelse
@endsection