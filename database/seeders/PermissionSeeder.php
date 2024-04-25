<?php

namespace Database\Seeders;

use App\Helpers\AppConstants;
use App\Models\Module;
use App\Models\Permissions;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions['settings'] = [
            AppConstants::VIEW_GENERAL_SETTINGS,
        ];
        $permissions['organization'] = [
            AppConstants::VIEW_ORGANIZATION_SETTINGS,
        ];
        $permissions['manage-roles'] = [
            AppConstants::CREATE_ROLES,
            AppConstants::EDIT_ROLES,
            AppConstants::VIEW_ROLES_LISTING,
            AppConstants::ROLE_HAS_PERMISSIONS,
        ];
        $permissions['manage-permissions'] = [
            AppConstants::VIEW_PERMISSIONS_LISTING,
            AppConstants::CREATE_PERMISSIONS,
            AppConstants::EDIT_PERMISSIONS,
        ];
        $permissions['manage-branches'] = [
            AppConstants::VIEW_BRANCHES_LISTING,
            AppConstants::CREATE_BRANCHES,
            AppConstants::EDIT_BRANCHES,
        ];
        $permissions['manage-departments'] = [
            AppConstants::VIEW_DEPARTMENT_LISTING,
            AppConstants::CREATE_DEPARTMENTS,
            AppConstants::EDIT_DEPARTMENTS,
        ];
        $permissions['manage-workshifts'] = [
            AppConstants::VIEW_WORK_SHIFTS_LISTING,
            AppConstants::CREATE_WORK_SHIFTS,
            AppConstants::EDIT_WORK_SHIFTS,
        ];
        $permissions['manage-categories'] = [
            AppConstants::VIEW_CATEGORIES_LISTING,
            AppConstants::CREATE_CATEGORIES,
            AppConstants::EDIT_CATEGORIES,
            AppConstants::CREATE_GRADES,
            AppConstants::EDIT_GRADES,
            AppConstants::CREATE_POSITIONS,
            AppConstants::EDIT_POSITIONS,
        ];

        $permissions['manage-employee'] = [
            AppConstants::CREATE_EMPLOYEE,
            AppConstants::EMPLOYEE_LISTING,
            AppConstants::EDIT_EMPLOYEE,

        ];

        foreach ($permissions as $key => $permission) {
            $id = Module::where('alias', $key)->first()->id;
            $data = [];
            foreach ($permission as $value) {
                $data[] = [
                    'name' => $value,
                    'module_id' => $id,
                ];
            }
            Permissions::insert($data);
        }
    }
}
