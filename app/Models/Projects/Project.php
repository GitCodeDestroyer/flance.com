<?php

namespace App\Models\Projects;

use App\Models\User;
use App\Models\Projects\ProjectComment;
use App\Models\Projects\ProjectView;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(ProjectComment::class, 'project_id');
    }

    public function views()
    {
        return $this->hasMany(ProjectView::class, 'project_id');
    }

    public function addComment($body, $comment_owner_id)
    {
        return $this->comments()->create(['body' => $body, 'comment_owner_id' => $comment_owner_id]);
    }

    public function addView($view_owner_id)
    {
        return $this->views()->create(['view_owner_id' => $view_owner_id]);
    }
}
