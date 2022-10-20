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
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => fn () => auth()->user() ? $request->user()->load('roles') : "",
            ],
            'currentUserRole' => fn () => auth()->user() && count($request->user()->roles) ? $request->user()?->roles[0]->name : null,
            'canManageEditors' => fn () => auth()->user() ? $request->user()->can('manage editors') : null,
            'notifications' => fn () => auth()->user() ? $request->user()->notifications->take(10) : null,
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
        ]);
    }
}
