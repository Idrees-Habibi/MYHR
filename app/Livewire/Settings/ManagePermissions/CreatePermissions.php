<?php

namespace App\Livewire\Settings\ManagePermissions;

use App\Helpers\AppConstants as AppConst;
use App\Models\Module;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermissions extends Component
{
    public string $name = '';

    public int $module_id = 0;

    public function render()
    {
        $this->authorize('authorize', AppConst::CREATE_PERMISSIONS);

        $moduleList = Module::all();

        return view('livewire.settings.manage-permissions.create-permissions', [
            'moduleList' => $moduleList,
        ]);
    }

    public function store()
    {
        Permission::create([
            'name' => $this->name,
            'module_id' => $this->module_id ?? null,
        ]);

        return redirect('permissions')->with('status', 'Permission Created Successfully');
    }
}
