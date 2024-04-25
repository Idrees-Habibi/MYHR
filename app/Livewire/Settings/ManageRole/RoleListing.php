<?php

namespace App\Livewire\Settings\ManageRole;

use App\Helpers\AppConstants as AppConst;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleListing extends Component
{
    public bool $showDeleteModal = false;

    public int $deleteRoleId = 0;

    public function render()
    {
        $this->authorize('authorize', AppConst::VIEW_ROLES_LISTING);
        $roles = Role::where('is_active', 1)->get();

        return view('livewire.settings.manage-role.role-listing', [
            'roles' => $roles,
        ]);
    }

    #[On('listUpdated')]
    public function listUpdated()
    {

    }

    #[On('showDeleteModal')]
    public function showDeleteModal(int $id = 0)
    {
        $this->deleteRoleId = $id;
        $this->showDeleteModal = true;
    }

    #[On('roleDelete')]
    public function roleDelete()
    {
        Role::where('id', $this->deleteRoleId)->update(['is_active' => 0]);
        $this->reset();
    }
}
