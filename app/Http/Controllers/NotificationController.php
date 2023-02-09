<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function update(Request $request, $id)
    {
        $notification = $request->user()->notifications()->find($id);
        $notification->markAsRead();

        return redirect($notification->data['route']);
    }
}
