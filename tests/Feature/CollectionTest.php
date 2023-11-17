<?php

namespace Tests\Feature;

use App\Models\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $collection;

    /**
     * Setup for all collection tests.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->setUpFaker();

        $this->collection = Collection::factory()->create();
    }

    /**
     * A test for creating a collection.
     */
    public function test_a_collection_can_be_created(): void
    {
        $this->assertDatabaseHas('collections', [
            'name' => $this->collection->name,
            'slug' => $this->collection->slug,
        ]);
    }

    /**
     * A test to make sure the slug matches the name.
     */
    public function test_collection_slug_and_name_match(): void
    {
        $this->assertSame($this->collection->slug, Str::slug($this->collection->name));
    }

    /**
     * A test for updating a collection
     */
    public function test_a_collection_can_be_updated(): void
    {
        $originalName = $this->collection->name;

        $this->collection->name = $this->faker->words(3, true);
        $this->collection->save();

        $this->assertNotEquals($this->collection->name, $originalName);
    }

    /**
     * A test for deleting a collection.
     */
    public function test_a_collection_can_be_deleted(): void
    {
        $this->collection->delete();

        $this->assertNotTrue(Collection::find(1));
    }
}
