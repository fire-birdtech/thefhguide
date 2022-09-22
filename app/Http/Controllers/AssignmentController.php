<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Choice;
use App\Models\Collection;
use App\Models\Goal;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AssignmentController extends Controller
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
        return inertia('Admin/Assignments/Create', [
            'editors' => User::with('roles')->whereHas('roles', function($q) {
                $q->whereIn('name', ['admin','editor','guest']);
            })->orderBy('name', 'desc')->get(),
            'assignable' => $this->getAssignable($request->assignable_type, $request->assignable_id),
            'assignableType' => $request->assignable_type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assignable = $this->getAssignable($request->assignable_type, $request->assignable_id);
        $assignable->assignments()->save(new Assignment([
            'summary' => $request->summary,
            'details' => $request->details,
            'user_id' => $request->user
        ]));

        return redirect()->route("editor.{$request->assignable_type}s.show", ["{$assignable->slug}"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }

    public function getAssignable($type, $id)
    {
        switch ($type) {
            case 'collection':
                return Collection::where('id', $id)->first();
            case 'project':
                return Project::where('id', $id)->first();
            case 'goal':
                return Goal::where('id', $id)->first();
            case 'choice':
                return Choice::where('id', $id)->first();
        }
    }
}
