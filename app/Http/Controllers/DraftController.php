<?php

namespace App\Http\Controllers;

use App\Enums\AssignmentStatus;
use App\Http\Requests\CreateDraftRequest;
use App\Http\Requests\DraftPublishRequest;
use App\Http\Requests\DraftSaveRequest;
use App\Models\Assignment;
use App\Models\Choice;
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
        $this->updateDraft($request, $draft);
        
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
        $this->updateDraft($request, $draft);
        
        if ($draft->draftable_type === 'collection') {
            Collection::create([
                'name' => $request['name']
            ]);
        }

        if ($draft->draftable_type === 'project') {
            Project::create([
                'name' => $request['name'],
                'collection_id' => $draft->parentable_id
            ]);
        }

        if ($draft->draftable_type === 'goal') {
            Goal::create([
                'name' => $request['name'],
                'summary' => $request['summary'],
                'project_id' => $draft->parentable_id
            ]);
        }

        if ($draft->draftable_type === 'choice') {
            Choice::create([
                'name' => $request['name'],
                'summary' => $request['summary'],
                'instructions' => $request['instructions'],
                'review' => $request['review'],
                'exercises' => $request['exercises'],
                'goal_id' => $draft->parentable_id
            ]);
        }

        $draft->update([ 'publish_date' => now() ]);

        if ($request->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('editor.dashboard');
    }

    public function notify(Request $request, Draft $draft)
    {
        $this->updateDraft($request, $draft);
        
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

    public function updateDraft($request, Draft $draft) {
        $draft->update([
            'name' => $request['name'],
            'summary' => $request['summary'],
            'instructions' => $request['instructions'],
            'review' => $request['review'],
            'exercises' => $request['exercises'],
        ]);
    }
}
