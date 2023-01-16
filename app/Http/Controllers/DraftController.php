<?php

namespace App\Http\Controllers;

use App\Enums\AssignmentStatus;
use App\Http\Requests\CreateDraftRequest;
use App\Http\Requests\DraftPublishRequest;
use App\Http\Requests\DraftSaveRequest;
use App\Models\Assignment;
use App\Models\Collection;
use App\Models\Draft;
use App\Models\Goal;
use App\Models\Project;
use App\Models\User;
use App\Notifications\DraftReady;
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
    public function store(CreateDraftRequest $request)
    {
        $draft = Draft::create([
            'draftable_type' => $request['draftable_type'],
            'user_id' => $request->user()->id
        ]);

        $parent = $this->getParentable($request['parent_type'], $request['parent_id']);

        if (isset($parent)) {
            $parent->childDrafts()->save($draft);
        }

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
        return inertia('Editor/Drafts/Show', [
            'draft' => $draft
        ]);
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
            'name' => $request['name'],
            'summary' => $request['summary'],
            'instructions' => $request['instructions'],
            'review' => $request['review'],
            'exercises' => $request['exercises'],
        ]);
        
        return redirect()->route('editor.drafts.show', [$draft->id]);
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
            $draftable->name = $request['name'];
        }
        if (isset($draftable->summary)) {
            $draftable->summary = $request['summary'];
        }
        if (isset($draftable->instructions)) {
            $draftable->instructions = $request['instructions'];
        }
        if (isset($draftable->resources)) {
            $draftable->resources = $request['resources'];
        }
        if (isset($draftable->review)) {
            $draftable->review = $request['review'];
        }
        if (isset($draftable->exercises)) {
            $draftable->exercises = $request['exercises'];
        }
        $draftable->timestamps = false;
        $draftable->locked = false;

        $draftable->save();

        $draft->update([ 'publish_date' => now() ]);

        $draft->assignment->update([ 'status' => AssignmentStatus::PUBLISHED ]);

        if ($request->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('editor.dashboard');
    }

    public function notify(Request $request, Draft $draft)
    {
        $request->user()->admin->notify(new DraftReady($draft));

        return redirect()->route('editor.dashboard');
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

    public function getParentable($type, $id)
    {
        switch ($type) {
            case 'collection':
                return Collection::find($id);
            case 'project':
                return Project::find($id);
            case 'goal':
                return Goal::find($id);
            default:
                return;
        }
    }
}
