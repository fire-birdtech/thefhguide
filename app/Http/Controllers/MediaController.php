<?php

namespace App\Http\Controllers;

use App\Exceptions\MediaAttachmentAlreadyExistsException;
use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class MediaController extends Controller
{
    public function index(): Response|ResponseFactory
    {
        return inertia('Editor/Media/Index', [
            'files' => Media::latest()->with(['choices', 'user'])->get(),
        ]);
    }

    public function create(): Response|ResponseFactory
    {
        return inertia('Editor/Media/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $media = Media::create([
            'name' => $request->name,
            'path' => $file = $request->file('file')->storePubliclyAs(
                'media',
                pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_BASENAME),
                ['disk' => 'public']
            ),
            'uploaded_by_user_id' => $request->user()->id,
        ]);

        return redirect()->route('editor.media.index');
    }

    public function attach(Request $request, Media $media, MediaService $mediaService): RedirectResponse
    {
        try {
            $mediaService->attachMediaable($media, $request->mediaableId, $request->mediaableType);

            return back();
        } catch (MediaAttachmentAlreadyExistsException $exception) {
            return back()->withErrors(['mediaableId' => $exception->getMessage()])->withInput();
        }
    }
}
