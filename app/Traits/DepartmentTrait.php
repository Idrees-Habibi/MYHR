<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

trait DepartmentTrait
{
    public function getAllDepartments(int $perPage = 10): LengthAwarePaginator|Collection
    {
        if ($perPage == 0) {
            return Cache::rememberForever(AppConst::ALL_DEPARTMENTS, function () {
                return Department::all();
            });
        }

        return Department::with('branch.country')->paginate($perPage);
    }

    public function getBranchDepartments(int $branchId = 0)
    {

        return Department::where('branch_id', $branchId)->get();
    }
}
