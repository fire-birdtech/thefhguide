<?php

namespace Tests\Feature\Controllers;

use App\Enums\AllowedUserRoles;
use App\Enums\ContentType;
use App\Models\Draft;
use App\Models\Goal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DraftControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(AllowedUserRoles::EDITOR->value);
    }

    public function testANewDraftCanBeStored(): void
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
