<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class NotificationController extends Controller
{
    public function update(Request $request, $id): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $notification = $request->user()->notifications()->find($id);
        $notification->markAsRead();

        return redirect($notification->data['route']);
    }
}
