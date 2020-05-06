<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\EventPolicy',
        'App\Model' => 'App\Policies\SliderPolicy',
        'App\Model' => 'App\Policies\ServicePolicy',
        'App\Model' => 'App\Policies\ServicetypePolicy',
        'App\Model' => 'App\Policies\ServiceconfigurePolicy',
        'App\Model' => 'App\Policies\UserPolicy',
        'App\Model' => 'App\Policies\ServicebookingPolicy',
        'App\Model' => 'App\Policies\RolePolicy',
        'App\Model' => 'App\Policies\PermissionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::resource('event', 'App\Policies\EventPolicy');
        Gate::resource('slider', 'App\Policies\SliderPolicy');
        Gate::resource('service', 'App\Policies\ServicePolicy');
        Gate::resource('servicetype', 'App\Policies\ServicetypePolicy');
        Gate::resource('serviceconfigure', 'App\Policies\ServiceconfigurePolicy');
        Gate::resource('users', 'App\Policies\UserPolicy');
        Gate::resource('servicebooking', 'App\Policies\ServicebookingPolicy');
        Gate::resource('role', 'App\Policies\RolePolicy');
        Gate::resource('permission', 'App\Policies\PermissionPolicy');
    }
}
