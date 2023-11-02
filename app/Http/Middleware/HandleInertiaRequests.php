<?php

namespace App\Http\Middleware;

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
            'navigation' => [
                [
                    'name' => 'FamilySearch',
                    'children' => [
                        [
                            'name' => '1: Family Tree',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '2: Memories',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '3: Descendants',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '4: Discover',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '5: Indexing',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '6: Help',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '7: Technology',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '8: DNA',
                            'link' => '#',
                            'children' => [],
                        ],
                    ],
                ],
                [
                    'name' => 'Ancestry',
                    'children' => [
                        [
                            'name' => '1: Get Started',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '2: Family Tree',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '3: Docs, Stories, Photos',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '4: Research',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '5: Help',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '6: Technology',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '7: DNA',
                            'link' => '#',
                            'children' => [],
                        ],
                    ],
                ],
                [
                    'name' => 'MyHeritage',
                    'children' => [
                        [
                            'name' => '1: Get Started',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '2: Family Tree',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '3: Docs, Photos',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '4: Research',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '5: Help',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '6: Technology',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '7: DNA',
                            'link' => '#',
                            'children' => [],
                        ],
                    ],
                ],
                [
                    'name' => 'Findmypast',
                    'children' => [
                        [
                            'name' => '1: Get Started',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '2: Family Tree',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '3: Docs, Photos',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '4: Research',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '5: Help',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '6: Technology',
                            'link' => '#',
                            'children' => [],
                        ], [
                            'name' => '7: DNA',
                            'link' => '#',
                            'children' => [],
                        ],
                    ],
                ],
            ],
            'notifications' => fn () => auth()->user() ? $request->user()->notifications->take(10) : null,
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
        ]);
    }
}
