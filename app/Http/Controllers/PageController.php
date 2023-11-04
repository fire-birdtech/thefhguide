<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\GoalPage;
use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class PageController extends Controller
{
    public function __invoke(Page $page): Response|ResponseFactory|null
    {
        if ($page->type === GoalPage::class) {
            $goal = Goal::where('page_id', $page->id)->with('project.collection')->first();
            return inertia('Pages/Goal', [
                'goal' => $goal,
                'title' => "{$goal->name}: {$goal->project->collection->name} Project {$goal->project->order}, Goal {$goal->order}",
            ]);
        }

        return null;
    }
}
