<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\FamilyDetailPolicy;
use App\Policies\FamilyMemberDetailPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
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
        UserPolicy::class,
        FamilyDetailPolicy::class,
        FamilyMemberDetailPolicy::class,
        RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });
    }
}
