<?php

namespace App\Livewire\OrganizationStructure\Department;

use App\Helpers\AppConstants as AppConst;
use App\Models\Department;
use App\Traits\BranchTrait;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditDepartmentModal extends Component
{
    use BranchTrait;

    public int $departmentId = 0;

    public bool $showDepartmentModal = false;

    #[Validate('required')]
    public string $name = '';

    public int $id = 0;

    public int $branchId = 0;

    public function render()
    {
        return view('livewire.organization-structure.department.edit-department-modal', [
            'branchesList' => $this->getBranchesList(),
        ]);
    }

    #[On('showDepartmentModal')]
    public function showDepartmentModal(int $id = 0): void
    {
        $this->id = $id;
        $this->authorize('authorize', $this->id > 0 ? AppConst::EDIT_DEPARTMENTS : AppConst::CREATE_DEPARTMENTS);

        $this->reset();

        $this->departmentId = $id;

        $this->getDepartmentData();

        $this->showDepartmentModal = true;
    }

    private function getDepartmentData(): void
    {
        if ($this->departmentId > 0) {
            $departmentData = Department::with('branch')->find($this->departmentId);
            $this->name = $departmentData?->name ?? '';
            $this->branchId = $departmentData->branch_id;

            return;
        }
    }

    public function save(): void
    {
        $data = $this->validate();
        $data['branch_id'] = $this->branchId;
        Department::updateOrCreate(['id' => $this->departmentId], $data);
        $this->reset();
        clearDepartmentCache();
        $this->dispatch('listrefresh');
    }
}
