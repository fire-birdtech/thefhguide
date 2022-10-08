<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     * 
     * 
     * @param Request $request
     */
    public function admin(Request $request)
    {
        return inertia('Admin/Dashboard', [
            'editors' => $request->user()->editors->load(['roles','unpublishedAssignments','unpublishedDrafts'])
        ]);
    }
}
