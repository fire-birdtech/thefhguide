<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Project;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Editor/Content/Index', [
            'collections' => Collection::all(),
            'projects' => Project::orderBy('slug')->with('collection')->whereIn('slug', ['canada', 'england', 'united-states'])->get(),
        ]);
    }
}
