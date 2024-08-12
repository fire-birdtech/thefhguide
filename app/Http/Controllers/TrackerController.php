<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class TrackerController extends Controller
{
    public function show(Project $project): Response
    {
        return inertia('Tracker/Project', [
            //            'project' => $project->load(['collection', 'goals.choices']),
            'project' => Project::query()
                ->where('id', $project->getAttribute('id'))
                ->with(['collection', 'goals', 'goals.choices' => function ($query) {
                    $query->with(['users' => function ($query) {
                        $query->where('id', Auth::id());
                    }]);
                }])
                ->first(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request
            ->user()
            ->choices()
            ->updateExistingPivot(
                $request['choice_id'],
                [
                    'status' => $request['status'],
                    'notes' => $request['notes'],
                ]
            );

        return back();
    }
}
