<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Setup for all project tests.
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->setUpFaker();

        $this->project = Project::factory()->create();
    }

    /**
     * A test for creating a project.
     *
     * @return void
     */
    public function test_a_project_can_be_created(): void
    {
        $this->assertDatabaseHas('projects', [
            'name' => $this->project->name,
            'slug' => $this->project->slug,
        ]);
    }

    /**
     * A test to make sure the slug matches the name.
     * 
     * @return void
     */
    public function test_project_slug_and_name_match(): void
    {
        $this->assertSame($this->project->slug, Str::slug($this->project->name));
    }

    /**
     * A test for updating a project
     * 
     * @return void
     */
    public function test_a_project_can_be_updated(): void
    {
        $original = $this->project;

        $this->project->name = $this->faker->words(3, true);
        $this->project->save();

        $this->assertNotEquals($this->project->name, $original->name);
    }

    /**
     * A test for deleting a project.
     * 
     * @return void
     */
    public function test_a_project_can_be_deleted(): void
    {
        $this->project->delete();

        $this->assertDatabaseMissing('projects', [
            'name' => $this->project->name,
            'slug' => $this->project->slug,
        ]);
    }
}
