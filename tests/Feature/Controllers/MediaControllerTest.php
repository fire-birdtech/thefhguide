<?php

namespace Tests\Feature\Controllers;

use App\Enums\AllowedUserRoles;
use App\Models\Media;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(AllowedUserRoles::EDITOR->value);
    }

    public function testStoreNewUploadedImage(): void
    {
        Storage::fake('public');

        $response = $this->actingAs($this->user)
            ->post(route('editor.media.store'), [
                'name' => 'test image',
                'file' => $file = UploadedFile::fake()->image('test.jpg')
            ]);

        $this->assertEquals('media/' . $file->name, Media::latest()->first()->path);

        Storage::disk('public')->assertExists('media/' . $file->name);
    }
}
