<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

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
     */
    public function version(Request $request): ?string
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
        ]);
    }

    public function setupNavigation(): array
    {
        $navigation = [];

        if (env('APP_ENV') === 'testing') {
            return $navigation;
        }

        $groupOne = [];
        $introNav = [
            ['name' => 'Get Started', 'link' => '#'],
            ['name' => '15 Minutes', 'link' => '#'],
            ['name' => 'About TFHG', 'link' => '#'],
            ['name' => 'FAQs', 'link' => '#'],

            ['name' => 'Beginner\'s Path', 'link' => '#'],
            ['name' => 'Computer Basics', 'link' => '#'],

            ['name' => 'The Learning System', 'link' => '#'],
            ['name' => 'Features Help', 'link' => '#'],
            ['name' => 'The Q&A Center', 'link' => '#'],
            ['name' => 'Quizzes', 'link' => '#'],
            ['name' => 'Music', 'link' => '#'],

            ['name' => 'TFHG Partners', 'link' => '#'],

            ['name' => 'Topics', 'link' => '#'],
            ['name' => 'TFHG Association', 'link' => '#'],
        ];
        $groupOne[] = [
            'name' => 'Intro',
            'menuItems' => $introNav,
        ];
        $navigation[] = $groupOne;

        $groupTwo = [];

        $learningPathNav = [
            ['name' => 'FamilySearch', 'link' => '#'],
            ['name' => 'Ancestry', 'link' => '#'],
            ['name' => 'MyHeritage', 'link' => '#'],
            ['name' => 'Findmypast', 'link' => '#'],
        ];

        $groupTwo[] = [
            'name' => 'Learning Path',
            'menuItems' => $learningPathNav,
        ];

        $navigation[] = $groupTwo;

        $groupThree = [];
        $countriesNav = [
            ['name' => 'All Countries', 'link' => '#'],
            ['name' => 'United States', 'link' => '#'],
            ['name' => 'England', 'link' => '#'],
            ['name' => 'Canada', 'link' => '#'],
            ['name' => 'Mexico', 'link' => '#'],

            ['name' => 'Caribbean', 'link' => '#'],
            ['name' => 'Central America', 'link' => '#'],
            ['name' => 'British Isles', 'link' => '#'],
            ['name' => 'Scandinavia', 'link' => '#'],
            ['name' => 'Central Europe', 'link' => '#'],
            ['name' => 'Western/So. Europe', 'link' => '#'],
            ['name' => 'Eastern Europe', 'link' => '#'],
            ['name' => 'Asia/Pacific', 'link' => '#'],
            ['name' => 'Africa', 'link' => '#'],
            ['name' => 'South America', 'link' => '#'],
            ['name' => 'International', 'link' => '#'],

            ['name' => 'Ethnic', 'link' => '#'],
            ['name' => 'Countries KB', 'link' => '#'],
        ];

        $groupThree[] = [
            'name' => 'Countries',
            'menuItems' => $countriesNav,
        ];

        $navigation[] = $groupThree;

        $groupFour = [];
        $trainersNav = [
            ['name' => 'Home', 'link' => '#'],
            ['name' => 'Presenting TFHG', 'link' => '#'],
            ['name' => '2-Minute Demos', 'link' => '#'],
            ['name' => 'TFHG on Paper', 'link' => '#'],
            ['name' => 'Class Outlines', 'link' => '#'],
            ['name' => 'Practice Exercises', 'link' => '#'],

            ['name' => 'Trainer\'s Corner', 'link' => '#'],
            ['name' => 'Consultant Training Tools', 'link' => '#'],
            ['name' => 'Audiences', 'link' => '#'],
            ['name' => 'The Q&A Center', 'link' => '#'],
            ['name' => 'Show Me Slides', 'link' => '#'],
            ['name' => 'Quizzes', 'link' => '#'],

            ['name' => 'Libraries', 'link' => '#'],
        ];
        $groupFour[] = [
            'name' => 'Trainers',
            'menuItems' => $trainersNav,
        ];

        $activitiesNav = [
            ['name' => 'Home', 'link' => '#'],
            ['name' => 'Family', 'link' => '#'],
            ['name' => 'Individuals', 'link' => '#'],
            ['name' => 'Youth', 'link' => '#'],
            ['name' => 'Kids Corner', 'link' => '#'],

            ['name' => 'Index - General', 'link' => '#'],
            ['name' => 'Index - Latter-day Saints', 'link' => '#'],
            ['name' => 'Planning Sheet', 'link' => '#'],

            ['name' => 'Home School', 'link' => '#'],
        ];
        $groupFour[] = [
            'name' => 'Activities',
            'menuItems' => $activitiesNav,
        ];

        $youthNav = [
            ['name' => 'Home', 'link' => '#'],
            ['name' => 'Photos and Stories', 'link' => '#'],
            ['name' => 'Activities', 'link' => '#'],
            ['name' => 'Family Tree', 'link' => '#'],
            ['name' => 'Places and Cultures', 'link' => '#'],
            ['name' => 'Indexing', 'link' => '#'],
            ['name' => 'Apps and Sites', 'link' => '#'],

            ['name' => 'Latter-day Saints', 'link' => '#'],
        ];
        $groupFour[] = [
            'name' => 'Youth',
            'menuItems' => $youthNav,
        ];

        $mediaNav = [
            ['name' => 'Blog', 'link' => '#'],
            ['name' => 'Facebook', 'link' => '#'],
            ['name' => 'YouTube', 'link' => '#'],
            ['name' => 'QRB Links', 'link' => '#'],
            ['name' => 'X (Twitter)', 'link' => '#'],
            ['name' => 'Pinterest', 'link' => '#'],
            ['name' => 'Instagram', 'link' => '#'],

            ['name' => 'Media Resources', 'link' => '#'],
            ['name' => 'Learn Social Media', 'link' => '#'],
        ];
        $groupFour[] = [
            'name' => 'Media',
            'menuItems' => $mediaNav,
        ];

        $faithsNav = [
            ['name' => 'Church of Jesus Christ', 'link' => '#'],
            ['name' => 'Weekly Family History Activities', 'link' => '#'],
            ['name' => 'Youth Pages', 'link' => '#'],
            ['name' => 'Catholic', 'link' => '#'],
            ['name' => 'Protestant', 'link' => '#'],
            ['name' => 'Jewish', 'link' => '#'],
        ];
        $groupFour[] = [
            'name' => 'Faiths',
            'menuItems' => $faithsNav,
        ];

        $navigation[] = $groupFour;

        $groupFive = [];

        $toolsNav = [
            ['name' => 'Vault', 'link' => '#'],
            ['name' => 'Online Tracker', 'link' => route('dashboard')],

            ['name' => 'Contact Us', 'link' => '#'],
            ['name' => 'Tip of the Day', 'link' => '#'],
            ['name' => 'Quotes', 'link' => '#'],
            ['name' => 'Languages', 'link' => '#'],
            ['name' => 'Terms of Use', 'link' => '#'],
        ];
        $groupFive[] = [
            'name' => 'Tools',
            'menuItems' => $toolsNav,
        ];

        $navigation[] = $groupFive;

        return $navigation;
    }
}
