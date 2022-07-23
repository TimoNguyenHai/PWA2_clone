<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('lectors', function(User $user) { return $user->is_admin; });
        Gate::define('courses', function(User $user) { return $user->is_admin; });           
        Gate::define('statistics', function(User $user) { return $user->is_admin; });
        Gate::define('list_student', function(User $user) { return $user->is_admin; });       
        Gate::define('registrations', function(User $user) { return $user->is_admin == 0; });         
        Gate::define('welcome', function(User $user) { return $user->is_admin == 0; });
        
    }
}
