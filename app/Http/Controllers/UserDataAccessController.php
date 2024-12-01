<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDataAccessRequest;
use App\Models\User;
use App\Models\UserDataAccess;
use Illuminate\Http\RedirectResponse;

class UserDataAccessController extends Controller
{
    public function store(StoreUserDataAccessRequest $request): RedirectResponse
    {
        $recipient = User::query()->where('email', $request->get('email'))->first();

        UserDataAccess::create([
            'sender_id' => $request->user()->id,
            'receiver_id' => $recipient->id,
            'message' => $request->get('message'),
        ]);

        return redirect()->back();
    }
}
