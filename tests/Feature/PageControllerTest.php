<?php

namespace Tests\Feature;

use App\Models\GoalPage;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAPageCanBeLoaded(): void
    {
        $page = Page::factory()->create([
            'slug' => 'page-name',
            'uri' => 'page-name',
            'type' => Page::class,
        ]);

        $response = $this->get($page->uri);

        $response->assertStatus(200);
    }

    public function testAPageWithAParentUriCanBeLoaded(): void
    {
        $page = Page::factory()->create([
            'slug' => 'page-slug',
            'uri' => "parent-slug/page-slug",
            'type' => Page::class,
        ]);

        $response = $this->get($page->uri);

        $response->assertStatus(200);
    }

    public function testPagesCanHaveAGoalType(): void
    {
        $page = GoalPage::factory()->create([
            'slug' => 'page-name',
            'uri' => 'page-name',
        ]);

        $response = $this->get($page->uri);

        $response->assertInertia(fn (Assert $page) => $page
            ->component('Pages/Goal')
        );
    }
}
