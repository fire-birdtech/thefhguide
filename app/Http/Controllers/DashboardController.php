<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function admin(Request $request): Response|ResponseFactory
    {
        return inertia('Admin/Dashboard', [
            'editors' => $request->user()->editors->load(['roles', 'unpublishedAssignments', 'unpublishedDrafts']),
            'drafts' => $request->user()->unpublishedDrafts()->get(),
        ]);
    }

    /**
     * Display the editor dashboard
     */
    public function editor(Request $request): Response|ResponseFactory
    {
        return inertia('Editor/Dashboard', [
            'assignments' => $request->user()->unpublishedAssignments()->get(),
            'drafts' => $request->user()->unpublishedDrafts()->get(),
        ]);
    }
}
