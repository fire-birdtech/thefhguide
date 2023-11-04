<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\GoalPage;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class PageController extends Controller
{
    public function __invoke(Page $page): Response|ResponseFactory|null
    {
        if ($page->type === GoalPage::class) {
            $goal = Goal::where('page_id', $page->id)->with(['project.collection', 'choices'])->first();
            return inertia('Pages/Goal', [
                'goal' => $goal,
                'project_navigation' => $this->getProjectNavigation($goal->project),
                'title' => "{$goal->name}: {$goal->project->collection->name} Project {$goal->project->order}, Goal {$goal->order}",
            ]);
        }

        return null;
    }

    public function getProjectNavigation(Project $project): array
    {
        $navigation = [];

        foreach ($project->goals as $goal) {
            $navigation[] = [
                'name' => "{$goal->order}: {$goal->nav_name}",
                'link' => route('pages.show', [$goal->page->uri])
            ];
        }

        return $navigation;
    }
}
