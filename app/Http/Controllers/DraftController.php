<?php

namespace App\Http\Controllers;

use App\Enums\ContentType;
use App\Http\Requests\DraftCreateRequest;
use App\Http\Requests\DraftPublishRequest;
use App\Http\Requests\DraftSaveRequest;
use App\Http\Requests\DraftStoreRequest;
use App\Models\Choice;
use App\Models\Collection;
use App\Models\Draft;
use App\Models\Goal;
use App\Models\Project;
use App\Notifications\DraftReady;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;
use stdClass;

class DraftController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(DraftCreateRequest $request): Response|ResponseFactory
    {
        return inertia('Editor/Drafts/Create', [
            'type' => $request['type'],
            'parentId' => $request['parent_id'],
        ]);
    }

    public function store(DraftStoreRequest $request): RedirectResponse
    {
        $content = isset($request->details) ? $this->formatContent($request) : null;

        $draft = Draft::create([
            'draftable_type' => $request['type'],
            'user_id' => $request->user()->id,
            'name' => $request['name'],
            'summary' => $request['summary'],
            'show_me_video_url' => $request['show_me_video_url'],
            'content' => $content,
        ]);

        if (isset($request['image'])) {
            $draft->updateCoverImage($request['image']);
        }

        $parent = $this->getParentable($request['type'], $request['parentId']);

        $parent?->childDrafts()->save($draft);

        return redirect()->route('editor.drafts.edit', [$draft->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Draft $draft): Response|ResponseFactory
    {
        return inertia('Editor/Drafts/Show', [
            'draft' => $draft,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Draft $draft, Request $request): Response|ResponseFactory
    {
        return inertia('Editor/Drafts/Edit', [
            'draft' => $draft,
            'userCanPublish' => $request->user()->can('publish content'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DraftSaveRequest $request, Draft $draft): RedirectResponse
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
     */
    public function publish(DraftPublishRequest $request, Draft $draft): RedirectResponse
    {
        $this->updateDraft($request, $draft);

        $content = new stdClass();

        if ($draft->draftable_type === ContentType::COLLECTION) {
            $content = Collection::create([
                'name' => $request['name'],
            ]);
        }

        if ($draft->draftable_type === ContentType::PROJECT) {
            $content = Project::create([
                'name' => $request['name'],
                'collection_id' => $draft->parentable_id,
            ]);
        }

        if ($draft->draftable_type === ContentType::GOAL) {
            $content = Goal::create([
                'name' => $request['name'],
                'summary' => $request['summary'],
                'project_id' => $draft->parentable_id,
            ]);
        }

        if ($draft->draftable_type === ContentType::CHOICE) {
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
                        'view' => ['href' => route("editor.{$draft->draftable_type}s.show", [$content->id])],
                    ],
                    'message' => 'Your draft has been published',
                    'title' => 'Published successfully',
                    'type' => 'success',
                ]);
        }

        return redirect()->route('editor.dashboard')
            ->with('notification', [
                'actions' => [
                    'view' => ['href' => route("editor.{$draft->draftable_type}s.show", [$content->id])],
                ],
                'message' => 'Your draft has been published',
                'title' => 'Published successfully',
                'type' => 'success',
            ]);
    }

    public function notify(Request $request, Draft $draft): RedirectResponse
    {
        $this->updateDraft($request, $draft);

        $request->user()->admin->notify(new DraftReady($draft));

        return redirect()->route('editor.dashboard');
    }

    public function getParentable($type, $id)
    {
        return match ($type) {
            'project' => Collection::where('id', $id),
            'goal' => Project::where('id', $id),
            'choice' => Goal::where('id', $id),
            default => null,
        };
    }

    public function updateDraft($request, Draft $draft): void
    {
        $content = isset($request->content) ? $this->formatContent($request) : null;

        $draft->update([
            'name' => $request['name'],
            'summary' => $request['summary'],
            'show_me_video_url' => $request['show_me_video_url'],
            'content' => $content,
        ]);
    }

    public function formatContent($request): array
    {
        $content = [];

        foreach ($request->details as $item) {
            $content[] = $item;
        }

        return $content;
    }
}
