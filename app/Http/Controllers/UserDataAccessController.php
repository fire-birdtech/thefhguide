<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDataAccessRequest;
use App\Http\Requests\UpdateUserDataAccessRequest;
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

    public function update(UpdateUserDataAccessRequest $request): RedirectResponse
    {
        $access = UserDataAccess::query()
            ->where('sender_id', $request->get('sender_id'))
            ->where('receiver_id', $request->get('receiver_id'))
            ->first();

        $access->update([
            'access_granted' => true,
        ]);

        return redirect()->back();
    }
}
