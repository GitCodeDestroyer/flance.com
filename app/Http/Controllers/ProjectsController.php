<?php

namespace App\Http\Controllers;

use App\Models\Projects\Project;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('app');
    }
    public function apiMy()
    {
        $projects = auth()->user()->projects;

        $paths = [];

        for ($i = 0; $i < count($projects); $i++) {
            array_push($paths, $projects[$i]->path());
        }

        return [$projects, $paths];
    }

    public function apiOther()
    {
        $projects = DB::table('projects')->get();

        $paths = [];

        for ($i = 0; $i < count($projects); $i++) {
            array_push($paths, $projects[$i]->path());
        }

        return [$projects, $paths];
    }

    public function apiComments(Project $project) {
        $comments = $project->comments;

        return [$project, $comments];
    }

    public function other()
    {
        $projects = DB::table('projects')->get();

        return view('app', compact('projects'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        auth()->user()->projects->create($attributes);

        return redirect('/my-projects');
    }

    public function show(Project $project)
    {
        $data = ['project' => $project, 'comments' => $project->comments()];

        return view('app', compact('data'));
    }

    public function create()
    {
        return view('projects.create');
    }
}
