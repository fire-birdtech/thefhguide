<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create all permissions
        collect(config('permission.permissions'))->each(function ($permission) {
            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        });

        // create roles and assign permissions
        collect(config('permission.roles_permissions'))->each(function ($role) {
            Role::firstOrCreate([
                'name' => $role['name'],
            ])->givePermissionTo($role['permissions']);
        });
    }
}
