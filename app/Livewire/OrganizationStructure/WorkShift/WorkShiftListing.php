<?php

namespace App\Livewire\OrganizationStructure\WorkShift;

use App\Helpers\AppConstants as AppConst;
use App\Models\WorkShift;
use App\Traits\WorkShiftTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class WorkShiftListing extends Component
{
    use WorkShiftTrait;

    public int $deleteWorkShifttId = 0;

    public bool $showDeleteModal = false;

    protected $listeners = ['listrefresh' => '$refresh'];

    public function render()
    {
        $this->authorize('authorize', AppConst::VIEW_WORK_SHIFTS_LISTING);

        return view('livewire.organization-structure.work-shift.work-shift-listing', [
            'workshifts' => $this->getAllWorkShifts(0),
        ]);
    }

    public function deleteShift(int $id = 0): bool
    {
        return WorkShift::where('id', $id)->delete();
    }

    #[On('listrefresh')]
    public function listrefresh(): void
    {

    }

    public function deleteModal(int $id): void
    {

        $this->deleteWorkShifttId = $id;
        $this->showDeleteModal = true;
    }

    public function destroyWorkShift(): void
    {
        WorkShift::destroy($this->deleteWorkShifttId);
        $this->reset();
        clearWorkShiftCache();
    }
}
