<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\StorePageRequest;
use App\Models\Collection;
use App\Models\Goal;
use App\Models\GoalPage;
use App\Models\InfoPage;
use App\Models\Media;
use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class PageController extends Controller
{
    public function __invoke(Page $page): Response
    {
        if ($page->type === GoalPage::class) {
            $goal = Goal::where('page_id', $page->id)->with(['project.collection', 'choices.media'])->first();

            return inertia('Pages/Goal', [
                'goal' => $goal,
                'projectNavigation' => $this->getProjectNavigation($goal->project),
                'title' => "{$goal->name}: {$goal->project->collection->name} Project {$goal->project->order}, Goal {$goal->order}",
            ]);
        }

        if ($page->getAttribute('type') === ProjectPage::class) {
            $project = Project::query()
                ->where('page_id', $page->getAttribute('id'))
                ->with('goals.choices')
                ->withCount('goals')
                ->first();

            return inertia('Pages/Project', [
                'project' => $project,
                'collectionNavigation' => $this->getCollectionNavigation($project->collection),
                'title' => "{$project->name}: {$project->collection->name} Project {$project->order}",
            ]);
        }

        return inertia('Pages/Show', [
            'page' => $page,
            'title' => $page->name,
        ]);
    }

    public function create(CreatePageRequest $request): Response
    {
        return inertia('Editor/Content/Pages/Create', [
            'collectionId' => intval($request['collectionId']),
            'files' => Media::latest()->take(8)->get(),
        ]);
    }

    public function store(StorePageRequest $request): RedirectResponse
    {
        $content = [];
        if (! empty($request->details)) {
            foreach ($request->details as $item) {
                $content[] = $item;
            }
        }

        InfoPage::create([
            'name' => $request->name,
            'hero' => $request->hero,
            'content' => $content,
            'collection_id' => $request->collectionId,
        ]);

        return back();
    }

    public function show(Page $page): Response
    {
        return inertia('Editor/Content/Pages/Show', [
            'page' => $page->load('collection'),
        ]);
    }

    public function edit(Page $page): Response
    {
        return inertia('Editor/Content/Pages/Edit', [
            'page' => $page,
            'files' => Media::latest()->take(8)->get(),
        ]);
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        $content = [];
        if (! empty($request->details)) {
            foreach ($request->details as $item) {
                $content[] = $item;
            }
        }
        $page->content = $content;
        $page->hero = $request->hero;
        $page->name = $request->name;

        $page->save();

        return back();
    }

    public function getProjectNavigation(Project $project): array
    {
        $navigation = [];

        foreach ($project->goals as $goal) {
            $navigation[] = [
                'name' => "{$goal->order}: {$goal->nav_name}",
                'link' => route('pages.show', [$goal->page->uri]),
            ];
        }

        return $navigation;
    }

    public function getCollectionNavigation(Collection $collection): array
    {
        $navigation = [];

        foreach ($collection->projects as $project) {
            $navigation[] = [
                'name' => "{$project->order}: {$project->name}",
                'link' => route('pages.show', [$project->page->uri]),
            ];
        }

        return $navigation;
    }
}
