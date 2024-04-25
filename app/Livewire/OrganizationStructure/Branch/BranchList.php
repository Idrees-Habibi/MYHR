<?php

namespace App\Livewire\OrganizationStructure\Branch;

use App\Helpers\AppConstants as AppConst;
use App\Models\Branch;
use App\Traits\BranchTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class BranchList extends Component
{
    use BranchTrait;

    public int $deleteBranchId = 0;

    public bool $showDeleteModal = false;

    public function render()
    {
        $this->authorize('authorize', AppConst::VIEW_BRANCHES_LISTING);

        return view('livewire.organization-structure.branch.branch-list', [
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
