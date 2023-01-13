<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function updatePassword(UpdateUserPasswordRequest $request, User $user)
    {
        $user->update([
            'password' => Hash::make($request['password'])
        ]);

        return redirect()->back()
            ->with('notification', [
                'actions' => false,
                'message' => 'Your password has been updated',
                'title' => 'Updated successfully',
                'type' => 'success'
            ]);
    }

    public function account()
    {
        return inertia('Settings/Account', [
            'user' => auth()->user(),
            'hasRoles' => count(auth()->user()->roles) ? true : false
        ]);
    }

    public function deleteAccount(User $user) {
        return "You're deleted!";
    }
}
