<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Requests\UpdateProjectOrderRequest;
use App\Models\Collection;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ProjectController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request): RedirectResponse
    {
        $project = Project::create($request->validated());

        return redirect()->route('editor.projects.show', [$project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): Response|ResponseFactory
    {
        return inertia('Editor/Content/Projects/Show', [
            'project' => $project->load(['childDrafts.user', 'collection', 'goals' => function ($q) {
                $q->orderBy('order', 'asc');
            }]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Project $project): Response|ResponseFactory|RedirectResponse
    {
        if ($request->user()->cannot('update', $project)) {
            return redirect()->back()
                ->with('notification', [
                    'actions' => false,
                    'message' => 'This project is not available for editing at this time',
                    'title' => 'Access error',
                    'type' => 'error',
                ]);
        }

        $collections = Collection::orderBy('name', 'asc')->get();

        return inertia('Editor/Content/Projects/Edit', [
            'collections' => $collections,
            'project' => $project->load('collection'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project): RedirectResponse
    {
        $project->name = $request->name;
        $project->save();

        if (isset($request['image'])) {
            $project->updateCoverImage($request['image']);
        }

        return redirect()->route('editor.projects.show', [$project->id]);
    }

    /**
     * Update the order of projects
     */
    public function updateProjectOrder(UpdateProjectOrderRequest $request, Project $project): RedirectResponse
    {
        $project->update([
            'order' => $request['updated_project']['order'],
        ]);

        Project::find($request['sibling_project']['id'])->update([
            'order' => $request['sibling_project']['order'],
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('editor.dashboard');
    }
}
