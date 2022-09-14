<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminInvitationRequest;
use App\Http\Requests\InvitationRegisterRequest;
use App\Mail\AdminInvitation;
use App\Models\Invitation;
use App\Models\User;
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
        $invitation = Invitation::create($request->validated());
        $this->sendInvitationEmail($invitation);

        return redirect()->route('admin.editors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invitation  $invitation
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
        if (!$request->hasValidSignature() || !$invitation)
        {
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

        $user->assignRole($request->role);

        event(new Registered($user));

        Auth::login($user);

        Invitation::destroy($request->id);

        return redirect(RouteServiceProvider::ADMINHOME);
    }

    public function process(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->assignRole($request->role);

        if (!Auth::check()) {
            Auth::login($user);
        }

        Invitation::destroy($request->id);

        return redirect(RouteServiceProvider::ADMINHOME);
    }

    /**
     * Send an email to invite a new admin
     * 
     * @param \App\Models\Invitation $invitation
     */
    public function sendInvitationEmail(Invitation $invitation)
    {
        Mail::to($invitation->email)->send(new AdminInvitation($invitation));
    }
}