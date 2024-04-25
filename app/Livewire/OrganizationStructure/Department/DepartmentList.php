<?php

namespace App\Livewire\OrganizationStructure\Department;

use App\Helpers\AppConstants as AppConst;
use App\Models\Department;
use App\Traits\DepartmentTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class DepartmentList extends Component
{
    use DepartmentTrait;

    public int $deleteDepartmentId = 0;

    public bool $showDeleteModal = false;

    public function render()
    {
        $this->authorize('authorize', AppConst::VIEW_DEPARTMENT_LISTING);

        return view('livewire.organization-structure.department.department-list', [
            'departments' => $this->getAllDepartments(0),
        ]);
    }

    public function deleteModal(int $id = 0): void
    {

        $this->deleteDepartmentId = $id;
        $this->showDeleteModal = true;
    }

    #[On('listrefresh')]
    public function listrefresh(): void
    {

    }

    public function destroyDepartment(): void
    {
        Department::destroy($this->deleteDepartmentId);
        $this->reset();
        clearDepartmentCache();
    }
}
