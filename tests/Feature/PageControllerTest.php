<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    public function testAPageCanBeLoaded(): void
    {
        Page::factory()->create([
            'slug' => 'page-name',
        ]);

        $response = $this->get('/page-name');

        $response->assertStatus(200);
    }
}
