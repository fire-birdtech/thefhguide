<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminInvitationRequest;
use App\Http\Requests\InvitationRegisterRequest;
use App\Mail\AdminInvitation;
use App\Models\Invitation;
use App\Models\User;
use App\Notifications\EditorInvitationAccepted;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    /**
     * Store a newly created invitation resource in storage.
     *
     * @param  \App\Http\Requests\AdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminInvitationRequest $request)
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
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        $invitation->delete();

        return redirect()->route('admin.editors.index');
    }

    public function resend(Request $request)
    {
        $invitation = Invitation::find($request->id);
        $this->sendInvitationEmail($invitation);
        $invitation->touch();

        return redirect()->route('admin.editors.index');
    }

    public function accept(Request $request)
    {
        $invitation = Invitation::find($request->invitation);
        if (! $request->hasValidSignature() || ! $invitation) {
            return redirect()->route('expired');
        }

        $hasAccount = User::where('email', $invitation->email)->first() ? true : false;

        return inertia('Admin/Editors/Accept', [
            'invitation' => $invitation,
            'hasAccount' => $hasAccount,
        ]);
    }

    public function register(InvitationRegisterRequest $request)
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

    public function process(Request $request)
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
     * Send an email to invite a new admin
     */
    public function sendInvitationEmail(Invitation $invitation)
    {
        Mail::to($invitation->email)->send(new AdminInvitation($invitation));
    }

    /**
     * Assign appropriate role(s) to user
     *
     * @param  string  $role
     */
    public function assignRoles(User $user, $role)
    {
        if ($role === 'admin') {
            $user->assignRole(['admin', 'editor']);
        } elseif ($role === 'editor') {
            $user->assignRole('editor');
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
