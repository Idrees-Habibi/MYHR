<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

trait EmployeeTrait
{
    public function getAllEmployees(int $perPage = 10): LengthAwarePaginator|Collection
    {
        if ($perPage == 0) {
            return Cache::rememberForever(AppConst::ALL_EMPLOYEES, function () {
                return User::all();
            });
        }

        return User::orderBy('id', 'desc')->paginate($perPage);
    }

    public function getRCLNumber(): int
    {
        return Cache::rememberForever(AppConst::RCL_NUMBER, function () {

            return User::max('id') + 1;
        });

    }

    public function employeeFamily(): array
    {
        $familyMembers = [];
        foreach (AppConst::FAMILY_MEMBER as $id => $label) {
            $familyMembers[] = [
                'id' => $id,
                'name' => $label,
            ];
        }

        return $familyMembers;
    }

    public function getAllEmployeeType(): array
    {
        $employeeType = [];

        foreach (AppConst::EMPLOYEE_TYPES as $id => $label) {
            $employeeType[] = [
                'id' => $id,
                'name' => $label,
            ];
        }

        return $employeeType;
    }

    public function getBloodGroup(): array
    {
        $BloodGroupType = [];
        foreach (AppConst::BLOOD_GROUP as $id => $label) {
            $BloodGroupType[] = [
                'id' => $id,
                'name' => $label,
            ];
        }

        return $BloodGroupType;
    }
}
