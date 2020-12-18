<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $project = factory('App\Models\Projects\Project')->create();

        $this->assertEquals('/projects/'.$project->id, $project->path());
    }

    /** @test */
    // public function it_belongs_to_an_owner()
    // {
    //     $project = factory('App\Project')->create();

    //     $this->assertInstanceOf('App\Project', $project->owner);
    // }

    /** @test */
    public function it_can_add_a_comment()
    {
        $this->signIn();
        $project = factory('App\Models\Projects\Project')->create();

        $comment = $project->addComment('Amazing!', auth()->id());

        $this->assertCount(1, $project->comments);
        $this->assertTrue($project->comments->contains($comment));
    }
}
