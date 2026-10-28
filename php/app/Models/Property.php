<?php

namespace App\Models;

use App\Models\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use BelongsToTenant;

    // tenant_id намеренно не в $fillable: его проставляет BelongsToTenant из текущего тенанта.
    protected $fillable = ['title', 'price'];
}
