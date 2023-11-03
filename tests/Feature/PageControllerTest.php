<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAPageCanBeLoaded(): void
    {
        $page = Page::factory()->create([
            'slug' => 'page-name',
            'uri' => 'page-name',
        ]);

        $response = $this->get($page->uri);

        $response->assertStatus(200);
    }

    public function testAPageWithAParentUriCanBeLoaded(): void
    {
        $page = Page::factory()->create([
            'slug' => 'page-slug',
            'uri' => "parent-slug/page-slug",
        ]);

        $response = $this->get($page->uri);

        $response->assertStatus(200);
    }
}
