<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoalRequest;
use App\Http\Requests\UpdateGoalOrderRequest;
use App\Models\Goal;
use App\Models\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class GoalController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(GoalRequest $request): RedirectResponse
    {
        $goal = Goal::create($request->validated());

        return redirect()->route('editor.goals.show', [$goal->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Goal $goal): Response|ResponseFactory
    {
        return inertia('Editor/Content/Goals/Show', [
            'goal' => $goal->load(['childDrafts.user', 'project', 'choices.resourceLinks', 'choices.goal' => function ($q) {
                $q->orderBy('order', 'asc');
            }]),
            'files' => Media::latest()->take(8)->get(),
        ]);
    }

    /**
     * Preview the specified resource
     */
    public function preview(Goal $goal): Response|ResponseFactory
    {
        return inertia('Editor/Content/Goals/Preview', [
            'goal' => $goal->load(['project.goals', 'choices.goal' => function ($q) {
                $q->orderBy('order', 'asc');
            }]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Goal $goal): Response|ResponseFactory|RedirectResponse
    {
        if ($request->user()->cannot('update', $goal)) {
            return redirect()->back()
                ->with('notification', [
                    'actions' => false,
                    'message' => 'This goal is not available for editing at this time',
                    'title' => 'Access error',
                    'type' => 'error',
                ]);
        }

        return inertia('Editor/Content/Goals/Edit', [
            'goal' => $goal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GoalRequest $request, Goal $goal): RedirectResponse
    {
        $goal->name = $request->name;
        $goal->summary = $request->summary;
        $goal->show_me_video_url = $request->show_me_video_url;
        $goal->save();

        return redirect()->route('editor.goals.show', [$goal->id]);
    }

    /**
     * Update the order of goals
     */
    public function updateGoalOrder(UpdateGoalOrderRequest $request, Goal $goal): RedirectResponse
    {
        $goal->update([
            'order' => $request['updated_goal']['order'],
        ]);

        Goal::find($request['sibling_goal']['id'])->update([
            'order' => $request['sibling_goal']['order'],
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal): RedirectResponse
    {
        $project = $goal->project;

        $goal->delete();

        return redirect()->route('editor.projects.show', [$project->id]);
    }
}
