<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_manage_projects() {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $project = factory('App\Models\Projects\Project')->create();

        // View projects
        $this->get('/projects')->assertRedirect('login');
        // View projects
        $this->get('/projects/create')->assertRedirect('login');
        // View a single project
        $this->get($project->path())->assertRedirect('login');
        // Create
        $this->post('/projects', $project->toArray())->assertRedirect('login');
    }

    /** @test */
    public function user_can_create_a_project()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(VerifyCsrfToken::class);
        $this->signIn();

        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
                'title' => $this->faker->sentence,
                'content' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attributes)->assertRedirect();
    }

    /** @test */
    public function user_can_view_their_project() {
        $this->signIn();

        $this->withoutExceptionHandling();

        $project = factory('App\Models\Projects\Project')->create(['owner_id' => auth()->id()]);

        $this->get($project->path())->assertSee($project->title)->assertSee($project->content);
    }

    /** @test */
    public function project_requires_a_title() {
        $this->withoutMiddleware(VerifyCsrfToken::class);
        $this->signIn();

        $attributes = factory('App\Models\Projects\Project')->raw(['title' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function project_requires_a_content() {
        $this->withoutMiddleware(VerifyCsrfToken::class);
        $this->signIn();

        $attributes = factory('App\Models\Projects\Project')->raw(['content' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('content');
    }
}
