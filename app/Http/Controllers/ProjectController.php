<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Collection;
use App\Models\Project;

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
            'projects' => Project::orderBy('updated_at', 'desc')->with('projectable')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collections = Collection::orderBy('name', 'asc')->get();
        return inertia('Editor/Content/Projects/Create', [
            'projectables' => collect($collections)->sortBy('name')->values()->all(),
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
        $projectable = $this->findProjectable($request->projectable);
        $projectable->projects()->save(new Project($request->validated()));

        return redirect()->route('editor.projects.index');
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
            'project' => $project->load(['goals', 'projectable']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $collections = Collection::orderBy('name', 'asc')->get();
        return inertia('Editor/Content/Projects/Edit', [
            'projectables' => collect($collections)->sortBy('name')->values()->all(),
            'project' => $project->load('projectable'),
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

        $projectable = $this->findProjectable($request->projectable);
        $projectable->projects()->save($project);

        return redirect()->route('editor.projects.show', [$project->slug]);
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

    public function findProjectable($projectable)
    {
        return Collection::where([
            ['id', $projectable['id']],
            ['name', $projectable['name']]
        ])->first();
    }
}
