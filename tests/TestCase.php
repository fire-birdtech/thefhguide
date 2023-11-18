<?php

namespace Tests;

use App\Enums\AllowedUserRoles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $permission = Permission::create([
            'name' => 'draft content',
        ]);
        Role::create([
            'name' => AllowedUserRoles::EDITOR->value,
        ])->givePermissionTo($permission);
    }

    public function getImagesDirectory(string $suffix = ''): string
    {
        return __DIR__.'/TestSupport/images'.($suffix == '' ? '' : '/'.$suffix);
    }

    public function getTestJpg(): string
    {
        return $this->getImagesDirectory('test.jpg');
    }
}
