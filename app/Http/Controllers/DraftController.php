<?php

namespace App\Http\Controllers;

use App\Http\Requests\DraftCreateRequest;
use App\Http\Requests\DraftPublishRequest;
use App\Http\Requests\DraftSaveRequest;
use App\Models\Choice;
use App\Models\Collection;
use App\Models\Draft;
use App\Models\Goal;
use App\Models\Project;
use App\Notifications\DraftReady;
use Illuminate\Http\Request;
use stdClass;

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
    public function create(DraftCreateRequest $request)
    {
        return inertia('Editor/Drafts/Create', [
            'type' => $request['type'],
            'parent_id' => $request['parent_id'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {return $request;
        $draft = Draft::create([
            'draftable_type' => $request['draftable_type'],
            'user_id' => $request->user()->id,
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
            'draft' => $draft,
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
            'userCanPublish' => $request->user()->can('publish content'),
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

        return redirect()->route('editor.drafts.show', [$draft->id])
            ->with('notification', [
                'actions' => false,
                'message' => 'Your draft has been updated',
                'title' => 'Updated successfully',
                'type' => 'success',
            ]);
    }

    /**
     * Publish the specified draft to its draftable model
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Draft  $draft
     */
    public function publish(DraftPublishRequest $request, Draft $draft)
    {
        $this->updateDraft($request, $draft);

        $content = new stdClass();

        if ($draft->draftable_type === 'collection') {
            $content = Collection::create([
                'name' => $request['name'],
            ]);
        }

        if ($draft->draftable_type === 'project') {
            $content = Project::create([
                'name' => $request['name'],
                'collection_id' => $draft->parentable_id,
            ]);
        }

        if ($draft->draftable_type === 'goal') {
            $content = Goal::create([
                'name' => $request['name'],
                'summary' => $request['summary'],
                'project_id' => $draft->parentable_id,
            ]);
        }

        if ($draft->draftable_type === 'choice') {
            $content = Choice::create([
                'name' => $request['name'],
                'summary' => $request['summary'],
                'instructions' => $request['instructions'],
                'review' => $request['review'],
                'exercises' => $request['exercises'],
                'goal_id' => $draft->parentable_id,
            ]);
        }

        $draft->update(['publish_date' => now()]);

        if ($request->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard')
                ->with('notification', [
                    'actions' => [
                        'view' => ['href' => route("editor.{$draft->draftable_type}s.show", [$content->slug])],
                    ],
                    'message' => 'Your draft has been published',
                    'title' => 'Published successfully',
                    'type' => 'success',
                ]);
        }

        return redirect()->route('editor.dashboard')
            ->with('notification', [
                'actions' => [
                    'view' => ['href' => route("editor.{$draft->draftable_type}s.show", [$content->slug])],
                ],
                'message' => 'Your draft has been published',
                'title' => 'Published successfully',
                'type' => 'success',
            ]);
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

    public function updateDraft($request, Draft $draft)
    {
        $draft->update([
            'name' => $request['name'],
            'summary' => $request['summary'],
            'instructions' => $request['instructions'],
            'review' => $request['review'],
            'exercises' => $request['exercises'],
        ]);
    }
}
