<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChoiceRequest;
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
        return inertia('Admin/Choices/Create', [
            'goal' =>  $request->goal,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChoiceRequest $request)
    {
        $goal = Goal::where('id', $request->goal_id)->first();

        Choice::create($request->validated());

        return redirect()->route('admin.goals.show', [$goal->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Choice  $choice
     * @return \Illuminate\Http\Response
     */
    public function show(Choice $choice)
    {
        return inertia('Admin/Choices/Show', [
            'choice' => $choice,
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
        return inertia('Admin/Choices/Edit', [
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
    public function update(ChoiceRequest $request, Choice $choice)
    {
        $choice->name = $request->name;
        $choice->summary = $request->summary;
        $choice->instructions = $request->instructions;
        $choice->resources = $request->resources;
        $choice->review = $request->review;
        $choice->exercises = $request->exercises;
        $choice->save();

        return redirect()->route('admin.choices.show', [$choice->id]);
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

        return redirect()->route('admin.goals.show', [$goal->slug]);
    }
}
