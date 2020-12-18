<?php

namespace App\Models\Projects;

use App\Models\Projects\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectView extends Model
{
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
