<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = $this->getModuleData();
        foreach ($modules ?? [] as $key => $module) {
            Module::updateOrCreate(
                ['alias' => $module['alias']],
                [
                    'name' => $module['name'],
                    'href' => $module['href'],
                    'alias' => $module['alias'],
                    'icon' => $module['icon'],
                    'is_active' => $module['is_active'],
                ]
            );
        }
    }

    private function getModuleData(): array
    {
        return [
            [
                'name' => 'General Setting',
                'href' => 'javascript:void(0)',
                'alias' => 'settings',
                'icon' => 'ri-settings-5-line',
                'is_active' => 1,

            ],
            [
                'name' => 'Organization Setting',
                'href' => 'javascript:void(0)',
                'alias' => 'organization',
                'icon' => 'ri-settings-5-line',
                'is_active' => 1,

            ],

            [
                'name' => 'Employee',
                'href' => 'javascript:void(0)',
                'alias' => 'employee',
                'icon' => 'ri-settings-5-line',
                'is_active' => 1,

            ],

        ];
    }
}
