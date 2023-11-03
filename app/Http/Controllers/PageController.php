<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\GoalPage;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(Page $page)
    {
        if ($page->type === GoalPage::class) {
            return inertia('Pages/Goal', [
                'goal' => Goal::where('page_id', $page->id)->with('project')->first(),
            ]);
        }
    }
}
