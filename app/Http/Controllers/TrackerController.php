<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Response;

class TrackerController extends Controller
{
    public function show(Project $project): Response
    {
        return inertia('Tracker/Project', [
            'project' => $project->load(['collection', 'goals.choices']),
        ]);
    }
}
