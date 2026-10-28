<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;

/**
 * Определяет тенант по заголовку X-Tenant (slug). В платформе это делается по домену.
 */
class ResolveTenant
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = Tenant::where('slug', $request->header('X-Tenant'))->first();
        abort_unless($tenant, 404, 'Tenant not found');

        app()->instance('currentTenant', $tenant);

        return $next($request);
    }
}
