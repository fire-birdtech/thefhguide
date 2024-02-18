<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (config('app.env') === 'local') {
            User::create([
                'name' => config('app.admin.name'),
                'email' => config('app.admin.email'),
                'password' => Hash::make(config('app.admin.password')),
            ])->markEmailAsVerified();
        }

        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(ProjectCollectionsSeeder::class);
    }
}
