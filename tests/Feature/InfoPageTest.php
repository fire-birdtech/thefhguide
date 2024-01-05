<?php

namespace Tests\Feature;

use App\Models\Collection;
use App\Models\InfoPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InfoPageTest extends TestCase
{
    use RefreshDatabase;

    public function testInfoPageLoaded(): void
    {
        $collection = Collection::factory()->create();

        $page = InfoPage::factory()->create([
            'collection_id' => $collection->id,
        ]);

        $response = $this->get($page->uri);

        $response->assertStatus(200);
    }
}
