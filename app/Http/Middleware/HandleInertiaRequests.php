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
                    'menuItems' => [
                        [
                            'name' => '1: Family Tree',
                            'link' => '#'
                        ],[
                            'name' => '2: Memories',
                            'link' => '#'
                        ],[
                            'name' => '3: Descendants',
                            'link' => '#'
                        ],[
                            'name' => '4: Discover',
                            'link' => '#'
                        ],[
                            'name' => '5: Indexing',
                            'link' => '#'
                        ],[
                            'name' => '6: Help',
                            'link' => '#'
                        ],[
                            'name' => '7: Technology',
                            'link' => '#'
                        ],[
                            'name' => '8: DNA',
                            'link' => '#'
                        ]
                    ]
                ],
                [
                    'name' => 'Ancestry',
                    'menuItems' => [
                        [
                            'name' => '1: Get Started',
                            'link' => '#'
                        ],[
                            'name' => '2: Family Tree',
                            'link' => '#'
                        ],[
                            'name' => '3: Docs, Stories, Photos',
                            'link' => '#'
                        ],[
                            'name' => '4: Research',
                            'link' => '#'
                        ],[
                            'name' => '5: Help',
                            'link' => '#'
                        ],[
                            'name' => '6: Technology',
                            'link' => '#'
                        ],[
                            'name' => '7: DNA',
                            'link' => '#'
                        ]
                    ]
                ],
                [
                    'name' => 'MyHeritage',
                    'menuItems' => [
                        [
                            'name' => '1: Get Started',
                            'link' => '#'
                        ],[
                            'name' => '2: Family Tree',
                            'link' => '#'
                        ],[
                            'name' => '3: Docs, Photos',
                            'link' => '#'
                        ],[
                            'name' => '4: Research',
                            'link' => '#'
                        ],[
                            'name' => '5: Help',
                            'link' => '#'
                        ],[
                            'name' => '6: Technology',
                            'link' => '#'
                        ],[
                            'name' => '7: DNA',
                            'link' => '#'
                        ]
                    ]
                ],
                [
                    'name' => 'Findmypast',
                    'menuItems' => [
                        [
                            'name' => '1: Get Started',
                            'link' => '#'
                        ],[
                            'name' => '2: Family Tree',
                            'link' => '#'
                        ],[
                            'name' => '3: Docs, Photos',
                            'link' => '#'
                        ],[
                            'name' => '4: Research',
                            'link' => '#'
                        ],[
                            'name' => '5: Help',
                            'link' => '#'
                        ],[
                            'name' => '6: Technology',
                            'link' => '#'
                        ],[
                            'name' => '7: DNA',
                            'link' => '#'
                        ]
                    ]
                ],
            ],
            'notifications' => fn () => auth()->user() ? $request->user()->notifications->take(10) : null,
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
        ]);
    }
}
