<?php

namespace Tests\Feature;

use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class PartnerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup for all partner tests.
     * 
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->partner = Partner::factory()->create();
    }

    /**
     * A test for creating a partner.
     *
     * @return void
     */
    public function test_a_partner_can_be_created(): void
    {
        $this->assertDatabaseHas('partners', [
            'name' => $this->partner->name,
            'website_url' => $this->partner->website_url,
            'slug' => $this->partner->slug,
        ]);
    }

    /**
     * A test to make sure the slug matches the name.
     * 
     * @return void
     */
    public function test_slug_and_name_match(): void
    {
        $this->assertSame($this->partner->slug, Str::slug($this->partner->name));
    }

    /**
     * A test for updating a partner
     * 
     * @return void
     */
    public function test_a_partner_can_be_updated(): void
    {
        $original = $this->partner;

        $this->partner->name = 'Ancestry';
        $this->partner->save();

        $this->assertNotEquals($this->partner->name, $original->name);
    }

    /**
     * A test for deleting a partner.
     * 
     * @return void
     */
    public function test_a_partner_can_be_deleted(): void
    {
        $this->partner->delete();

        $this->assertDatabaseMissing('partners', [
            'name' => $this->partner->name,
            'website_url' => $this->partner->website_url,
            'slug' => $this->partner->slug,
        ]);
    }
}
