<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\DailyTip;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class DailyTipsController extends Controller
{
    public function index(): Response
    {
//        $tips = DailyTip::query()
//            ->get()
//            ->groupBy(function ($tip) {
//                return Carbon::parse($tip->created_at)->format('Y');
//            })
//            ->map(function ($year) {
//                return $year->groupBy(function ($tip) {
//                    return Carbon::parse($tip->created_at)->format('m');
//                });
//            });

        return inertia('Editor/DailyTips/Index', [
            'tips' => DailyTip::query()->latest()->take(10)->get(),
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
