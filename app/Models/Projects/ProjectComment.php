<?php

namespace App\Models\Projects;

use App\Models\Projects\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectComment extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function path() {
        return "/projects/{$this->project->id}/comments/{$this->id}";
    }
}
