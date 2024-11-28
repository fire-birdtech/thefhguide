<?php

namespace Tests\Feature;

use App\Models\Goal;
use App\Models\GoalPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_pages_can_have_a_goal_type(): void
    {
        $page = GoalPage::factory()->create([
            'slug' => 'page-name',
            'uri' => 'page-name',
        ]);
        Goal::factory()->create([
            'page_id' => $page->id,
        ]);

        $response = $this->get($page->uri);

        $response->assertInertia(fn (Assert $page) => $page
            ->component('Pages/Goal')
            ->has('goal')
        );
    }
}
