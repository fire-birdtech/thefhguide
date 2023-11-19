<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class MediaController extends Controller
{
    public function index(): Response|ResponseFactory
    {
        return inertia('Media/Index');
    }

    public function create(): Response|ResponseFactory
    {
        return inertia('Media/Create');
    }

    public function store(Request $request): void
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
