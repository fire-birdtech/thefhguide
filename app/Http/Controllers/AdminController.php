<?php

namespace App\Http\Controllers;

use App\Mail\AdminInvitation;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Response;
use Inertia\ResponseFactory;
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
        $this->middleware('can:manage editors');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response|ResponseFactory
    {
        return inertia('Admin/Editors/Index', [
            'users' => User::role(['admin', 'editor'])->with('roles')->get(),
            'invitations' => Invitation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|ResponseFactory
    {
        return inertia('Admin/Editors/Create', [
            'admins' => User::role('admin')->with('roles')->orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response|ResponseFactory
    {
        return inertia('Admin/Editors/Show', [
            'user' => $user->load(['admin', 'roles']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response|ResponseFactory
    {
        return inertia('Admin/Editors/Edit', [
            'admins' => User::role('admin')->with('roles')->get(),
            'roles' => Role::whereNotIn('name', ['super admin', 'developer'])->get(),
            'user' => $user->load(['admin', 'roles']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $roleNames = [];
        foreach ($request->roles as $role) {
            $roleNames[] = $role['name'];
        }
        $user->syncRoles($roleNames);

        $admin = User::find($request['admin_id']);
        $admin->editors()->save($user);

        return redirect()->route('admin.editors.show', [$user->id]);
    }

    /**
     * Remove role so user is no longer an editor
     */
    public function remove(Request $request, User $user): RedirectResponse
    {
        $user->assignments->each(function ($assignment) use ($user) {
            $assignment->update([
                'user_id' => $user->admin_id,
            ]);
        });

        $user->roles()->detach();
        $user->update([
            'admin_id' => null,
        ]);

        return redirect()->route('admin.editors.index');
    }

    /**
     * Email invite a new admin
     */
    public function sendInvitationEmail(Invitation $invitation): void
    {
        Mail::to($invitation->email)->send(new AdminInvitation($invitation));
    }
}
