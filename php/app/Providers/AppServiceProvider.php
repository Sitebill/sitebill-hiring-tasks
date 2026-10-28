<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Администратор управляет только своим тенантом: роль admin И совпадение tenant_id.
        Gate::define('manage-tenant', function (User $user) {
            return $user->role === 'admin'
                && app()->bound('currentTenant')
                && (int) $user->tenant_id === (int) app('currentTenant')->id;
        });
    }
}
