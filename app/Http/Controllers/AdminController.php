<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminInvitationRequest;
use App\Mail\AdminInvitation;
use App\Models\Admin;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'editors' => Admin::all(),
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
        return inertia('Admin/Editors/Create');
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
     * Store a newly created invitation resource in storage.
     *
     * @param  \App\Http\Requests\AdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInvite(AdminInvitationRequest $request)
    {
        $invitation = Invitation::create($request->validated());
        $this->sendInvitationEmail($invitation);

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
