<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\Role;
use App\Models\RoleHasPermissions;
use Illuminate\Support\Facades\Cache;

trait Permissions
{
    public array $modules = [];

    private function loadPermissions($roleId): void
    {

        Cache::rememberForever(AppConst::ROLE.'-'.$roleId, function () use ($roleId) {

            $subModulesCheck = fn ($subModule) => $subModule->where('sub_modules.is_active', 1)->orderBy('name')->with('module');

            // fetch role with permissions, sub modules and module

            $role = Role::with(['subModules' => $subModulesCheck])->find($roleId);
            $sidebar = [];

            if (count($role?->subModules ?? []) > 0) {

                // first loop over sub modules

                foreach ($role->subModules as $subModuleKey => $subModule) {

                    $subModules = [];

                    // collect sub modules of a module by ID and push in an array

                    foreach ($role->subModules as $key => $sub) {
                        if ($subModule->module_id == $sub->module_id) {

                            $subModules[] = $sub->toArray();

                            $this->modules[$sub->alias] = [

                                'create' => $sub->pivot->create,

                                'read' => $sub->pivot->read,

                                'update' => $sub->pivot->update,

                                'delete' => $sub->pivot->delete,

                            ];

                            // unset current sub module to avoid duplication
                            unset($role->subModules[$key]);
                        }
                    }

                    // make sure you push the data in sidebar only if you find a sub module

                    if (count($subModules) > 0) {

                        $sidebar[] = [

                            'id' => $subModule->module->id,

                            'href' => $subModule->module->href,

                            'name' => $subModule->module->name,

                            'icon' => $subModule->module->icon,

                            'alias' => $subModule->module->alias,

                            'subModules' => $subModules,

                        ];
                    }
                }
            }
            // put both arrays in session
            Cache::rememberForever(AppConst::ROLE_SIDE_BAR.'-'.$roleId, function () use ($sidebar) {
                return $sidebar;
            });
            Cache::rememberForever(AppConst::ROLE_PERMISSIONS.'-'.$roleId, function () {
                return $this->modules;
            });
        });
    }

    public function checkPermission(string $requestedPermission = '', int $roleId = 0): bool
    {

        $request = RoleHasPermissions::where('role_id', $roleId)->whereHas('permissions', function ($q) use ($requestedPermission) {
            $q->where('name', $requestedPermission);
        })->first();

        if ($request) {
            return true;
        }

        return false;
    }
}
