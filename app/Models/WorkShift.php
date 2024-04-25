<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    use HasFactory;

    protected $table = 'work_shifts';

    protected $fillable = ['name', 'start_time', 'end_time', 'shift_code'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_work_shifts');
    }
}
