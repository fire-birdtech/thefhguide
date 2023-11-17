<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Response;
use Inertia\ResponseFactory;

class SettingsController extends Controller
{
    public function profile(): Response|ResponseFactory
    {
        return inertia('Settings/Profile', [
            'user' => auth()->user(),
        ]);
    }

    public function updateProfile(UpdateUserProfileRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->back()
            ->with('notification', [
                'actions' => false,
                'message' => 'Your personal information has been updated',
                'title' => 'Updated successfully',
                'type' => 'success',
            ]);
    }

    public function security(): Response|ResponseFactory
    {
        return inertia('Settings/Security', [
            'user' => auth()->user(),
        ]);
    }

    public function updatePassword(UpdateUserPasswordRequest $request, User $user): RedirectResponse
    {
        $user->update([
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back()
            ->with('notification', [
                'actions' => false,
                'message' => 'Your password has been updated',
                'title' => 'Updated successfully',
                'type' => 'success',
            ]);
    }

    public function account(Request $request): Response|ResponseFactory
    {
        return inertia('Settings/Account', [
            'user' => auth()->user(),
            'hasRoles' => (bool) count($request->user()->roles),
        ]);
    }

    public function deleteAccount(User $user): string
    {
        return "You're deleted!";
    }
}
