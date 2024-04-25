<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermissions extends Model
{
    use HasFactory;

    public function permissions()
    {
        return $this->hasMany(Permissions::class, 'id', 'permission_id');
    }
}
