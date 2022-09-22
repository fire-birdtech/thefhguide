<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminInvitationRequest;
use App\Mail\AdminInvitation;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\ResponseFactory|\Inertia\Response
     */
    public function index()
    {
        return inertia('Admin/Editors/Index', [
            'users' => User::role(['admin', 'editor', 'guest'])->with('roles')->get(),
            'invitations' => Invitation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\ResponseFactory|\Inertia\Response
     */
    public function create()
    {
        return inertia('Admin/Editors/Create', [
            'roles' => Role::all()->except(1),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return inertia('Admin/Editors/Show', [
            'user' => $user->load('roles'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return inertia('Admin/Editors/Edit', [
            'user' => $user->load('roles'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $user->update($request->validated());
        // $user->save();

        $user->assignRole($request->role);

        return redirect()->route('admin.editors.show', [$user->id]);
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
