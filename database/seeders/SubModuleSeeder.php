<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subModules = $this->getSubModulesData();
        $modules = Module::all();

        foreach ($subModules ?? [] as $key => $value) {
            foreach ($value ?? [] as $key2 => $subModule) {
                $newSubModule = Module::updateOrCreate([
                    'alias' => $subModule['alias'],
                ], [
                    'module_id' => $modules->where('alias', $key)->first()->id,
                    'name' => $subModule['name'],
                    'route_name' => $subModule['route_name'],
                    'path' => $subModule['path'],
                    'alias' => $subModule['alias'],
                    'icon' => $subModule['icon'],
                    'is_active' => $subModule['is_active'],
                ]);
            }
        }
    }

    private function getSubModulesData(): array
    {
        $subModules = [];
        $subModules['settings'][] = [
            'name' => 'Manage Roles',
            'route_name' => 'roles',
            'path' => '',
            'alias' => 'manage-roles',
            'icon' => 'ri-shield-user-line',
            'is_active' => 1,
        ];
        $subModules['settings'][] = [
            'name' => 'Manage Permissions',
            'route_name' => 'permissions',
            'path' => '',
            'alias' => 'manage-permissions',
            'icon' => 'ri-shield-user-line',
            'is_active' => 1,
        ];

        $subModules['organization'][] = [
            'name' => 'Branches',
            'route_name' => 'branches',
            'path' => '',
            'alias' => 'manage-branches',
            'icon' => 'ri-shield-user-line',
            'is_active' => 1,
        ];
        $subModules['organization'][] = [
            'name' => 'Departments',
            'route_name' => 'departments',
            'path' => '',
            'alias' => 'manage-departments',
            'icon' => 'ri-shield-user-line',
            'is_active' => 1,
        ];
        $subModules['organization'][] = [
            'name' => 'Work Shifts',
            'route_name' => 'workshifts',
            'path' => '',
            'alias' => 'manage-workshifts',
            'icon' => 'ri-shield-user-line',
            'is_active' => 1,
        ];
        $subModules['organization'][] = [
            'name' => 'Category',
            'route_name' => 'categories',
            'path' => '',
            'alias' => 'manage-categories',
            'icon' => 'ri-shield-user-line',
            'is_active' => 1,
        ];

        $subModules['employee'][] = [
            'name' => 'Employee Registeration',
            'route_name' => 'employee.edit',
            'path' => '',
            'alias' => 'manage-employee',
            'icon' => 'ri-shield-user-line',
            'is_active' => 1,
        ];
        $subModules['employee'][] = [
            'name' => 'Employee List',
            'route_name' => 'employees',
            'path' => '',
            'alias' => 'manage-employee',
            'icon' => 'ri-shield-user-line',
            'is_active' => 1,
        ];

        return $subModules;
    }
}
