<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {
        Collection::create($request->validated());

        return redirect()->route('editor.collections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return inertia('Editor/Content/Collections/Show', [
            'collection' => $collection->load(['childDrafts.user', 'projects' => function ($q) {
                $q->orderBy('order', 'asc');
            }]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Collection $collection)
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, Collection $collection)
    {
        $collection->name = $request['name'];
        $collection->save();

        return redirect()->route('editor.collections.show', [$collection->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Collection $collection
     * @return RedirectResponse
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
