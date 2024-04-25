<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'parent_id', 'name'];

    public function subGrades(): HasMany
    {
        return $this->hasMany(Grade::class, 'parent_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class, 'grade_id');
    }
}
