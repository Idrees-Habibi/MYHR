<?php

namespace App\Providers;

use App\Models\User;
use App\Traits\Permissions;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    use Permissions;

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('authorize', function (User $user, string $permission): bool {

            return $this->checkPermission($permission, $user->role_id);
        });

    }
}
