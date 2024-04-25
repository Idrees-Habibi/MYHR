<?php

namespace App\Livewire\Settings\ManageRole;

use App\Helpers\AppConstants as AppConst;
use App\Models\Role;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateRole extends Component
{
    public string $name = '';

    public int $roleId = 0;

    public bool $showAssignmentModal = false;

    public function render()
    {
        $this->authorize('authorize', AppConst::CREATE_ROLES);

        return view('livewire.settings.manage-role.create-role');
    }

    #[On('showAssignmentModal')]
    public function showAssignmentModal(int $id = 0)
    {
        $this->roleId = $id;
        $this->showAssignmentModal = true;
    }

    public function store()
    {
        Role::create([
            'name' => $this->name,
            'is_active' => 1,
        ]);
        $this->showAssignmentModal = false;
        $this->dispatch('listUpdated');
        $this->reset();
    }
}
