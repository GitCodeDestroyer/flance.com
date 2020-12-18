<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectCommentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_add_comments_to_project()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $project = factory('App\Models\Projects\Project')->create();

        $this->post($project->path().'/comments')->assertRedirect('login');
    }

    /** @test */
    public function a_project_can_have_comments()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $this->withoutExceptionHandling();

        $this->signIn();

        $project = auth()->user()->projects->create(
            factory('App\Models\Projects\Project')->raw()
        );

        $this->post($project->path().'/comments', ['body' => 'Amazing!']);

        $this->get($project->path())->assertSee('Amazing!');
    }

    /** @test */
    public function a_comment_reqiures_a_body() {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $this->signIn();

        $project = auth()->user()->projects->create(
            factory('App\Models\Projects\Project')->raw()
        );

        $attributes = factory('App\Models\Comments\ProjectComment')->raw(['body' => '']);

        $this->post($project->path().'/comments', $attributes)->assertSessionHasErrors('body');
    }
}
