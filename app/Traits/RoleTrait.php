<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

trait RoleTrait
{
    public function getEmployeeRoles(int $perPage = 10): LengthAwarePaginator|Collection
    {
        if ($perPage == 0) {
            return Cache::rememberForever(AppConst::ALL_ROLES, function () {
                return Role::where('is_active', 1)->get();
            });
        }

        return Role::all()->paginate($perPage);

    }
}
