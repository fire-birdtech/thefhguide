<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class GroupController extends Controller
{
    public function index(Request $request): Response
    {
        return inertia('Groups/Index', [
            'groups' => $request->user()->groups,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $group = Group::query()->create([
            'name' => $request->get('name'),
            'owner_id' => $request->user()->id,
        ]);

        $request->user()->groups()->attach($group);

        return redirect()->back();
    }
}
