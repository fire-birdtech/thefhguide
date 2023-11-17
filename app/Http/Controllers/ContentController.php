<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Project;
use Inertia\Response;
use Inertia\ResponseFactory;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response|ResponseFactory
    {
        return inertia('Editor/Content/Index', [
            'collections' => Collection::all(),
            'projects' => Project::orderBy('slug')->with('collection')->whereIn('slug', ['canada', 'england', 'united-states'])->get(),
        ]);
    }
}
