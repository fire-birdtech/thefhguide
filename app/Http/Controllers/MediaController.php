<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        Media::create([
            'name' => $request->name,
            'path' => $file = $request->file('file')->storePubliclyAs(
                'media',
                pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_BASENAME),
                ['disk' => 'public']
            ),
        ]);
    }
}
