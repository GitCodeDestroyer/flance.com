@extends('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->content }}</p>
    <h3>Comments</h3>
    <ul>
        @forelse ($project->comments as $comment)
            <li>{{ $comment->comment_owner_id }}</li>
            <li>{{ $comment->body }}</li>
        @empty
            <li>There are no comments...</li>
        @endforelse
        <form action="{{ $project->path().'/comments' }}" method="POST">
            @csrf
            <div class="mt-5 form-group">
                <input type="text" id="body" name="body" class="col-md-6 form-control" placeholder="Add a comment...">
            </div>
        </form>
    </ul>
@endsection
