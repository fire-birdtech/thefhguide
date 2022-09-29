<?php

namespace App\Http\Controllers;

use App\Enums\AssignmentStatus;
use App\Http\Requests\DraftPublishRequest;
use App\Http\Requests\DraftSaveRequest;
use App\Models\Assignment;
use App\Models\Draft;
use Illuminate\Http\Request;

class DraftController extends Controller
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
    public function store(Request $request)
    {
        $assignment = Assignment::where('id', $request['assignmentId'])->first();
        $assignable = $assignment->assignable;
        $draft = $assignable->createDraft($assignment->user_id, $assignment->id);
        $assignment->status = AssignmentStatus::STARTED;
        $assignment->save();
        
        return redirect()->route('editor.drafts.edit', [$draft->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function show(Draft $draft)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function edit(Draft $draft, Request $request)
    {
        return inertia('Editor/Drafts/Edit', [
            'draft' => $draft,
            'userCanPublish' => $request->user()->can('publish content')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function update(DraftSaveRequest $request, Draft $draft)
    {
        $draft->update([
            'new_name' => $request['new_name'],
            'new_summary' => $request['new_summary'],
            'new_instructions' => $request['new_instructions'],
            'new_resources' => $request['new_resources'],
            'new_review' => $request['new_review'],
            'new_exercises' => $request['new_exercises'],
        ]);
        
        return redirect()->route('editor.dashboard');
    }

    /**
     * Publish the specified draft to its draftable model
     * 
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\Draft  $draft
     */
    public function publish(DraftPublishRequest $request, Draft $draft)
    {
        $draftable = $draft->draftable;
        if (isset($draftable->name)) {
            $draftable->name = $request['new_name'];
        }
        if (isset($draftable->summary)) {
            $draftable->summary = $request['new_summary'];
        }
        if (isset($draftable->instructions)) {
            $draftable->instructions = $request['new_instructions'];
        }
        if (isset($draftable->resources)) {
            $draftable->resources = $request['new_resources'];
        }
        if (isset($draftable->review)) {
            $draftable->review = $request['new_review'];
        }
        if (isset($draftable->exercises)) {
            $draftable->exercises = $request['new_exercises'];
        }

        $draftable->save();

        $draft->update([ 'publish_date' => now() ]);

        $draft->assignment->update([ 'status' => AssignmentStatus::PUBLISHED ]);

        return redirect()->route('editor.dashboard');
    }

    public function notify(Request $request)
    {
        return "Ready for Publish!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Draft $draft)
    {
        //
    }
}
