<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeFamily extends Model
{
    use HasFactory;

    protected $table = 'user_family_details';

    protected $fillable = ['user_id', 'name', 'cnic', 'type', 'date_of_birth'];
}
