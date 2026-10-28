<?php

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

pest()->extend(TestCase::class)->use(RefreshDatabase::class)->in('Feature');

function makeTenant(string $slug): Tenant
{
    return Tenant::create(['name' => ucfirst($slug), 'slug' => $slug]);
}

function makeUser(Tenant $tenant, string $role = 'visitor'): User
{
    return User::create([
        'tenant_id' => $tenant->id,
        'name' => $role,
        'email' => uniqid($role . '_') . '@example.test',
        'password' => 'secret-password',
        'role' => $role,
    ]);
}

/** Привязать тенант так же, как это делает middleware (для создания данных в тесте). */
function bindTenant(Tenant $tenant): void
{
    app()->instance('currentTenant', $tenant);
}

function unbindTenant(): void
{
    app()->forgetInstance('currentTenant');
}
