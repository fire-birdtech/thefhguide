<?php

namespace Tests\Feature\Controllers;

use App\Enums\AllowedUserRoles;
use App\Enums\ContentType;
use App\Models\Draft;
use App\Models\Goal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DraftControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(AllowedUserRoles::EDITOR->value);
    }

    public function test_a_new_draft_can_be_stored(): void
    {
        $name = $this->faker()->word();

        $response = $this->actingAs($this->user)
            ->post(route('editor.drafts.store'), [
                'type' => ContentType::CHOICE->value,
                'parentId' => (string) Goal::factory()->create()->id,
                'name' => $name,
            ]);

        $draft = Draft::where('name', $name)->first();

        $this->assertEquals(ContentType::CHOICE->value, $draft->draftable_type);
    }
}
