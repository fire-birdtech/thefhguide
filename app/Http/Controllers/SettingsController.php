<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function profile() {
        return inertia('Settings/Profile', [
            'user' => auth()->user()
        ]);
    }

    public function updateProfile(UpdateUserProfileRequest $request, User $user) {
        $user->update($request->validated());

        return redirect()->back()
            ->with('notification', [
                'actions' => false,
                'message' => 'Your personal information has been updated',
                'title' => 'Updated successfully',
                'type' => 'success'
            ]);
    }

    public function security() {
        return inertia('Settings/Security', [
            'user' => auth()->user()
        ]);
    }
}
