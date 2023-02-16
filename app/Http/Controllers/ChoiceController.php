<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChoiceStoreRequest;
use App\Http\Requests\UpdateChoiceOrderRequest;
use App\Models\Choice;
use App\Models\Goal;
use Illuminate\Http\Request;

class ChoiceController extends Controller
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
        return inertia('Editor/Content/Choices/Create', [
            'goal' => $request->goal,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChoiceStoreRequest $request)
    {
        $goal = Goal::where('id', $request->goal_id)->first();

        Choice::create([
            'name' => $request['name'],
            'goal_id' => $request['goal_id'],
            'content' => json_encode($request['content'])
        ]);

        return redirect()->route('editor.goals.show', [$goal->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Choice  $choice
     * @return \Illuminate\Http\Response
     */
    public function show(Choice $choice)
    {
        return inertia('Editor/Content/Choices/Show', [
            'choice' => $choice->load('goal'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Choice  $choice
     * @return \Illuminate\Http\Response
     */
    public function edit(Choice $choice)
    {
        return inertia('Editor/Content/Choices/Edit', [
            'choice' => $choice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Choice  $choice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Choice $choice)
    {
        $choice->name = $request->name;
        $choice->summary = $request->summary;
        $choice->instructions = $request->instructions;
        $choice->resources = $request->resources;
        $choice->review = $request->review;
        $choice->exercises = $request->exercises;
        $choice->save();

        return redirect()->back()
            ->with('notification', [
                'actions' => false,
                'message' => 'Updates have been saved',
                'title' => 'Choice saved successfully',
                'type' => 'success',
            ]);
    }

    /**
     * Update the order of choices
     *
     * @param  UpdateChoiceOrderRequest  $request
     * @param  Choice  $choice
     * @return Response
     */
    public function updateChoiceOrder(UpdateChoiceOrderRequest $request, Choice $choice)
    {
        $choice->update([
            'order' => $request['updated_choice']['order'],
        ]);

        Choice::find($request['sibling_choice']['id'])->update([
            'order' => $request['sibling_choice']['order'],
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Choice  $choice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Choice $choice)
    {
        $goal = $choice->goal;

        $choice->delete();

        return redirect()->route('editor.goals.show', [$goal->slug]);
    }
}
