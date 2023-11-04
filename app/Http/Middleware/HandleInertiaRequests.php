<?php

namespace App\Http\Middleware;

use App\Models\Collection;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => fn () => auth()->user() ? $request->user()->load('roles') : null,
            ],
            'currentUserRole' => fn () => auth()->user() && count($request->user()->roles) ? $request->user()?->roles[0]->name : null,
            'canManageEditors' => fn () => auth()->user() ? $request->user()->can('manage editors') : null,
            'flash' => [
                'notification' => fn () => $request->session()->get('notification'),
            ],
            'navigation' => $this->setupNavigation(),
            'notifications' => fn () => auth()->user() ? $request->user()->notifications->take(10) : null,
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
        ]);
    }

    public function setupNavigation(): array
    {
        $navigation = [];

        $familysearch = Collection::where('slug', 'familysearch')->with('projects')->first();
        $familysearchNav = [];
        foreach ($familysearch?->projects as $project) {
            $familysearchNav[] = [
                'name' => "{$project->order}: {$project->name}",
                'link' => route('pages.show', [$project->goals()->first()->page->uri]),
            ];
        }
        $navigation[] = [
            'name' => $familysearch->name,
            'menuItems' => $familysearchNav,
        ];

        $ancestry = Collection::where('slug', 'ancestry')->with('projects')->first();
        $ancestryNav = [];
        foreach ($ancestry?->projects as $project) {
            $ancestryNav[] = [
                'name' => "{$project->order}: {$project->name}",
                'link' => route('pages.show', [$project->goals()->first()->page->uri]),
            ];
        }
        $navigation[] = [
            'name' => $ancestry->name,
            'menuItems' => $ancestryNav,
        ];

        $myheritage = Collection::where('slug', 'myheritage')->with('projects')->first();
        $myheritageNav = [];
        foreach ($myheritage?->projects as $project) {
            $myheritageNav[] = [
                'name' => "{$project->order}: {$project->name}",
                'link' => route('pages.show', [$project->goals()->first()->page->uri]),
            ];
        }
        $navigation[] = [
            'name' => $myheritage->name,
            'menuItems' => $myheritageNav,
        ];

        $findmypast = Collection::where('slug', 'findmypast')->with('projects')->first();
        $findmypastNav = [];
        foreach ($findmypast?->projects as $project) {
            $findmypastNav[] = [
                'name' => "{$project->order}: {$project->name}",
                'link' => route('pages.show', [$project->goals()->first()->page->uri]),
            ];
        }
        $navigation[] = [
            'name' => $findmypast->name,
            'menuItems' => $findmypastNav,
        ];

        return $navigation;
    }
}
