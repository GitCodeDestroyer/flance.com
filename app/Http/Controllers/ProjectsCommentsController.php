<?php

namespace App\Http\Controllers;

use App\Models\Projects\Project;
use Illuminate\Routing\Controller;

class ProjectsCommentsController extends Controller
{
    public function store(Project $project)
    {
        request()->validate([
            'body' => 'required',
        ]);

        return $project->addComment(request('body'), auth()->id());
    }
}
