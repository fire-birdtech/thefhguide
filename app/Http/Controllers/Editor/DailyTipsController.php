<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\DailyTip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class DailyTipsController extends Controller
{
    public function index(): Response
    {
        return inertia('Editor/DailyTips/Index', [
            'tips' => DailyTip::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        DailyTip::query()->create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
        ]);

        return back();
    }
}
