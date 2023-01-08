<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoalRequest;
use App\Http\Requests\UpdateGoalOrderRequest;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
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
    public function create(Request $request)
    {
        return inertia('Editor/Content/Goals/Create', [
            'project' => $request->project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalRequest $request)
    {
        $goal = Goal::create($request->validated());

        return redirect()->route('editor.goals.show', [$goal->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        return inertia('Editor/Content/Goals/Show', [
            'goal' => $goal->load(['project', 'choices.resources', 'choices.goal' => function ($q) {
                $q->orderBy('order', 'asc');
            }]),
        ]);
    }

    /**
     * Preview the specified resource
     * 
     * @param \App\Models\Goal $goal
     * @return \Illuminate\Http\Response
     */
    public function preview(Goal $goal)
    {
        return inertia('Editor/Content/Goals/Preview', [
            'goal' => $goal->load(['project.goals', 'choices.goal' => function ($q) {
                $q->orderBy('order', 'asc');
            }]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Goal $goal)
    {
        if ($request->user()->cannot('update', $goal)) {
            return redirect()->back()
                ->with('notification', [
                    'actions' => false,
                    'message' => 'This goal is not available for editing at this time',
                    'title' => 'Access error',
                    'type' => 'error'
                ]);
        }

        return inertia('Editor/Content/Goals/Edit', [
            'goal' => $goal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(GoalRequest $request, Goal $goal)
    {
        $goal->name = $request->name;
        $goal->summary = $request->summary;
        $goal->show_me_video_url = $request->show_me_video_url;
        $goal->save();

        return redirect()->route('editor.goals.show', [$goal->slug]);
    }

    /**
     * Update the order of goals
     * 
     * @param UpdateGoalOrderRequest $request
     * @param Goal $goal
     * @return Response
     */
    public function updateGoalOrder(UpdateGoalOrderRequest $request, Goal $goal)
    {
        $goal->update([
            'order' => $request['updated_goal']['order']
        ]);

        Goal::find($request['sibling_goal']['id'])->update([
            'order' => $request['sibling_goal']['order']
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        $project = $goal->project;

        $goal->delete();

        return redirect()->route('editor.projects.show', [$project->slug]);
    }
}
