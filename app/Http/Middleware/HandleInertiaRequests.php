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
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
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

        if (env('APP_ENV') === 'testing') {
            return $navigation;
        }

        $groupOne = [];
        $introNav = [];
        $groupOne[] = [
            'name' => 'Intro',
            'menuItems' => $introNav,
        ];
        $navigation[] = $groupOne;

        $groupTwo = [];
        $familysearch = Collection::where('slug', 'familysearch')->with('projects')->first();
        $familysearchNav = [];
        foreach ($familysearch?->projects as $project) {
            $familysearchNav[] = [
                'name' => "{$project->order}: {$project->name}",
                'link' => route('pages.show', [$project->goals()->first()->page->uri]),
            ];
        }
        $groupTwo[] = [
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
        $groupTwo[] = [
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
        $groupTwo[] = [
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
        $groupTwo[] = [
            'name' => $findmypast->name,
            'menuItems' => $findmypastNav,
        ];

        $navigation[] = $groupTwo;

        $groupThree = [];
        $trainersNav = [];
        $groupThree[] = [
            'name' => 'Trainers',
            'menuItems' => $trainersNav,
        ];

        $activitiesNav = [];
        $groupThree[] = [
            'name' => 'Activities',
            'menuItems' => $activitiesNav,
        ];

        $youthNav = [];
        $groupThree[] = [
            'name' => 'Youth',
            'menuItems' => $youthNav,
        ];

        $mediaNav = [];
        $groupThree[] = [
            'name' => 'Media',
            'menuItems' => $mediaNav,
        ];

        $faithsNav = [];
        $groupThree[] = [
            'name' => 'Faiths',
            'menuItems' => $faithsNav,
        ];

        $navigation[] = $groupThree;

        $groupFour = [];
        $countriesNav = [];
        $groupFour[] = [
            'name' => 'Countries',
            'menuItems' => $countriesNav,
        ];

        $vaultNav = [];
        $groupFour[] = [
            'name' => 'Vault',
            'menuItems' => $vaultNav,
        ];

        $trackerNav = [];
        $groupFour[] = [
            'name' => 'Tracker',
            'menuItems' => $trackerNav,
        ];

        $navigation[] = $groupFour;

        $groupFive = [];
        $miscNav = [];
        $groupFive[] = [
            'name' => 'Misc',
            'menuItems' => $miscNav,
        ];

        $navigation[] = $groupFive;

        return $navigation;
    }
}
