<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = ['country_id', 'name', 'address', 'is_active'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
