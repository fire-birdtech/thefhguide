<?php

namespace App\Http\Controllers;

use App\Models\GoalPage;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Page $page)
    {
        if ($page->type === GoalPage::class) {
            return inertia('Pages/Goal', []);
        }
    }
}
