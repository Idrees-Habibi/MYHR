<?php

namespace App\Livewire\Settings\ManageRole;

use App\Helpers\AppConstants as AppConst;
use App\Models\Module;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolePermissions extends Component
{
    public bool $showAssignmentModal = false;

    public array $selectedPermissions = [];

    public int $roleId = 0;

    public function mount($roleId)
    {
        $this->roleId = $roleId;
        $role = Role::find($this->roleId);
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
    }

    public function render()
    {
        $this->authorize('authorize', AppConst::ROLE_HAS_PERMISSIONS);

        $modules = Module::with('permissions')->get();

        return view('livewire.settings.manage-role.role-permissions', [
            'modules' => $modules,
        ]);
    }

    public function storePermissions()
    {
        $role = Role::findOrFail($this->roleId);
        $role->permissions()->sync($this->selectedPermissions);
        return redirect()->route('roles');
    }
}
