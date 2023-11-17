<?php

namespace App\Providers;

use App\Models\Collection;
use App\Models\Goal;
use App\Models\Project;
use App\Policies\CollectionPolicy;
use App\Policies\GoalPolicy;
use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Collection::class => CollectionPolicy::class,
        Goal::class => GoalPolicy::class,
        Project::class => ProjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        Gate::after(function ($user) {
            return $user->hasRole(['developer', 'super admin']);
        });
    }
}
