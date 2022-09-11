<?php

namespace Tests\Feature;

use App\Mail\AdminInvitation;
use App\Models\Invitation;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class InvitationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A test for inviting a new user to be an admin.
     *
     * @return void
     */
    public function test_admin_can_invite_new_user_to_be_admin()
    {
        $this->seed(RolesAndPermissionsSeeder::class);

        Mail::fake();

        $email = $this->faker->email();
        $name = $this->faker->name();

        $invitation = Invitation::create([
            'email' => $email,
            'name' =>  $name,
            'role' => 'admin'
        ]);

        Mail::to($invitation->email)->send(new AdminInvitation($invitation));

        Mail::assertSent(AdminInvitation::class);

        $response = $this->post(route('invitations.register'), [
            'name' => $name,
            'email' => $email,
            'id' => $invitation->id,
            'role' => $invitation->role,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseMissing('invitations', [
            'id' => $invitation->id,
        ]);
        $response->assertRedirect(RouteServiceProvider::ADMINHOME);
    }

    /**
     * A test for inviting an existing user to be an admin
     * 
     * @return void
     */
    public function test_admin_can_invite_existing_user_to_be_admin()
    {
        $this->seed(RolesAndPermissionsSeeder::class);
        
        Mail::fake();

        $user = User::factory()->create();

        $invitation = Invitation::create([
            'email' => $user->email,
            'name' => $user->name,
            'role' => 'admin',
        ]);

        Mail::to($invitation->email)->send(new AdminInvitation($invitation));

        Mail::assertSent(AdminInvitation::class);

        $response = $this->post(route('invitations.accept'), [
            'email' => $user->email,
            'id' => $invitation->id,
            'role' => $invitation->role,
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseMissing('invitations', [
            'id' => $invitation->id,
        ]);
        $response->assertRedirect(RouteServiceProvider::ADMINHOME);
    }
}
