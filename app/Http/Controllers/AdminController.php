<?php

namespace App\Http\Controllers;

use App\Mail\AdminInvitation;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:manage editors')->except('show');
        $this->middleware('can:view editors')->only('show');
    }

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
            'admins' => User::role('admin')->with('roles')->orderBy('name', 'asc')->get(),
            'roles' => Role::all()->except(1)
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
            'user' => $user->load(['admin','roles']),
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
        $admins = [];
        if ($user->hasRole(['guest','editor'])) {
            $admins = User::role('admin')->with('roles')->get();
        } else if ($user->hasRole('admin')) {
            $admins = User::role('super admin')->with('roles')->get();
        }
        return inertia('Admin/Editors/Edit', [
            'admins' => $admins,
            'roles' => Role::all(),
            'user' => $user->load('roles')
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
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        // $user->save();

        $user->assignRole($request->role);

        $admin = User::find($request['admin_id']);
        $admin->editors()->save($user);

        return redirect()->route('admin.editors.show', [$user->id]);
    }

    /**
     * Remove role so user is no longer an editor
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, User $user)
    {
        $user->roles()->detach();

        return redirect()->route('admin.editors.index');
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
