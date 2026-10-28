<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * role: 'visitor' (обычный зарегистрированный) или 'admin' (администратор своего тенанта).
 * Пользователь привязан к тенанту, но сам скоуп не использует.
 */
class User extends Authenticatable
{
    protected $fillable = ['tenant_id', 'name', 'email', 'password', 'role'];

    protected $hidden = ['password'];
}
