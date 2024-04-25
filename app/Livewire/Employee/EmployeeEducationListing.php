<?php

namespace App\Livewire\Employee;

use App\Models\Branch;
use App\Traits\BranchTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class EmployeeEducationListing extends Component
{
    use BranchTrait;

    public int $deleteBranchId = 0;

    public bool $showDeleteModal = false;

    public function render()
    {
        return view('livewire.employee.employee-education-listing', [
            'branches' => $this->getAllBranches(0),
        ]);
    }
    #[On('listrefresh')]
    public function listrefresh(): void
    {

    }

    public function deleteModal(int $id = 0): void
    {
        $this->deleteBranchId = $id;
        $this->showDeleteModal = true;
    }

    public function destroyBranch(): void
    {
        Branch::destroy($this->deleteBranchId);
        $this->reset('deleteBranchId');
        clearBranchCache();
    }
}
