<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\UpdateProjectOrderRequest;
use App\Models\Collection;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Editor/Content/Projects/Index', [
            'projects' => Project::orderBy('updated_at', 'desc')->with('collection')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $collections = Collection::orderBy('name', 'asc')->get();
        return inertia('Editor/Content/Projects/Create', [
            'collection' => $request->collection,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->validated());

        return redirect()->route('editor.projects.show', [$project->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return inertia('Editor/Content/Projects/Show', [
            'project' => $project->load(['collection', 'goals' => function ($q) {
                $q->orderBy('order', 'asc');
            }]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Project $project)
    {
        if ($request->user()->cannot('update', $project)) {
            return back()->withErrors(['message' => 'This project is not available for editing at this time']);
        }

        $collections = Collection::orderBy('name', 'asc')->get();
        return inertia('Editor/Content/Projects/Edit', [
            'collections' => $collections,
            'project' => $project->load('collection'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->name = $request->name;
        $project->save();

        if (isset($request['image'])) {
            $project->updateCoverImage($request['image']);
        }

        return redirect()->route('editor.projects.show', [$project->slug]);
    }

    /**
     * Update the order of projects
     * 
     * @param UpdateProjectOrderRequest $request
     * @param Project $project
     * @return Response
     */
    public function updateProjectOrder(UpdateProjectOrderRequest $request, Project $project)
    {
        $project->update([
            'order' => $request['updated_project']['order']
        ]);

        Project::find($request['sibling_project']['id'])->update([
            'order' => $request['sibling_project']['order']
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('editor.projects.index');
    }
}
