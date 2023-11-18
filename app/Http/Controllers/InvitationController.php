<?php

namespace App\Http\Controllers;

use App\Enums\AllowedUserRoles;
use App\Http\Requests\AdminInvitationRequest;
use App\Http\Requests\InvitationRegisterRequest;
use App\Mail\AdminInvitation;
use App\Models\Invitation;
use App\Models\User;
use App\Notifications\EditorInvitationAccepted;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Inertia\Response;
use Inertia\ResponseFactory;

class InvitationController extends Controller
{
    /**
     * Store a newly created invitation resource in storage.
     */
    public function store(AdminInvitationRequest $request): RedirectResponse
    {
        $invitation = Invitation::create([
            'admin_id' => $request->admin['id'],
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role,
        ]);
        $this->sendInvitationEmail($invitation);

        return redirect()->route('admin.editors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation): RedirectResponse
    {
        $invitation->delete();

        return redirect()->route('admin.editors.index');
    }

    public function resend(Request $request): RedirectResponse
    {
        $invitation = Invitation::find($request->id);
        $this->sendInvitationEmail($invitation);
        $invitation->touch();

        return redirect()->route('admin.editors.index');
    }

    public function accept(Request $request): Response|ResponseFactory|RedirectResponse
    {
        $invitation = Invitation::find($request->invitation);
        if (! $request->hasValidSignature() || ! $invitation) {
            return redirect()->route('expired');
        }

        $hasAccount = (bool) User::where('email', $invitation->email)->first();

        return inertia('Admin/Editors/Accept', [
            'invitation' => $invitation,
            'hasAccount' => $hasAccount,
        ]);
    }

    public function register(InvitationRegisterRequest $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->assignRoles($user, $request->role);

        $admin = User::find($request['admin_id']);
        $admin->editors()->save($user);

        event(new Registered($user));

        $this->notifyAdmins($request->id, $user);

        Auth::login($user);

        Invitation::destroy($request->id);

        if ($user->hasRole('admin')) {
            return redirect(RouteServiceProvider::ADMINHOME);
        }

        return redirect(RouteServiceProvider::EDITORHOME);
    }

    public function process(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::where('email', $request->email)->first();

        $this->assignRoles($user, $request->role);

        $admin = User::find($request['admin_id']);
        $admin->editors()->save($user);

        $this->notifyAdmins($request->id, $user);

        if (! Auth::check()) {
            Auth::login($user);
        }

        Invitation::destroy($request->id);

        if ($user->hasRole('admin')) {
            return redirect(RouteServiceProvider::ADMINHOME);
        }

        return redirect(RouteServiceProvider::EDITORHOME);
    }

    /**
     * Email invite a new admin
     */
    public function sendInvitationEmail(Invitation $invitation): void
    {
        Mail::to($invitation->email)->send(new AdminInvitation($invitation));
    }

    /**
     * Assign appropriate role(s) to user
     */
    public function assignRoles(User $user, string $role): void
    {
        if ($role === 'admin') {
            $user->assignRole([AllowedUserRoles::ADMIN->value, AllowedUserRoles::EDITOR->value]);
        } elseif ($role === 'editor') {
            $user->assignRole(AllowedUserRoles::EDITOR->value);
        }
    }

    /**
     * Notify admins when a new editor accepts their invitation
     */
    public function notifyAdmins(int $invitationId, User $user): void
    {
        foreach (User::role('admin')->get() as $admin) {
            $admin->notify(new EditorInvitationAccepted(Invitation::find($invitationId), $user));
        }
    }
}
