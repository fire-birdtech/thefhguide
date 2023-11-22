<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class CollectionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CollectionRequest $request): RedirectResponse
    {
        Collection::create($request->validated());

        return redirect()->route('editor.collections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection): Response|ResponseFactory
    {
        return inertia('Editor/Content/Collections/Show', [
            'collection' => $collection->load(['childDrafts.user', 'pages', 'projects' => function ($q) {
                $q->orderBy('order', 'asc');
            }]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Collection $collection): Response|ResponseFactory|RedirectResponse
    {
        if ($request->user()->cannot('update', $collection)) {
            return redirect()->back()
                ->with('notification', [
                    'actions' => false,
                    'message' => 'This collection is not available for editing at this time',
                    'title' => 'Access error',
                    'type' => 'error',
                ]);
        }

        return inertia('Editor/Content/Collections/Edit', [
            'collection' => $collection,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollectionRequest $request, Collection $collection): RedirectResponse
    {
        $collection->name = $request['name'];
        $collection->save();

        return redirect()->route('editor.collections.show', [$collection->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Collection $collection): RedirectResponse
    {
        if ($request->user()->cannot('delete', $collection)) {
            return redirect()->back()
                ->with('notification', [
                    'actions' => false,
                    'message' => 'You do not have the required permissions to archive this collection.',
                    'title' => 'Access error',
                    'type' => 'error',
                ]);
        }

        $collection->delete();

        return redirect()->route('editor.collections.index');
    }
}
