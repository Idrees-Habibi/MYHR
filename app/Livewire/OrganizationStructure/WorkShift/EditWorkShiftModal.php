<?php

namespace App\Livewire\OrganizationStructure\WorkShift;

use App\Helpers\AppConstants as AppConst;
use App\Models\WorkShift;
use Livewire\Attributes\On;
use Livewire\Component;

class EditWorkShiftModal extends Component
{
    public bool $showWorkShifthModels = false;

    public int $shiftId = 0;

    public string $name = '';

    public string $shift_code = '';

    public string $start_time = '';

    public string $end_time = '';

    public function render()
    {
        return view('livewire.organization-structure.work-shift.edit-work-shift-modal');
    }

    #[On('showWorkShiftModal')]
    public function showWorkShiftModal(int $id = 0): void
    {
        if ($id > 0) {
            $this->authorize('authorize', AppConst::EDIT_WORK_SHIFTS);
        } else {
            $this->authorize('authorize', AppConst::CREATE_WORK_SHIFTS);
        }

        $this->reset();
        $this->shiftId = $id;
        $this->getShiftData();
        $this->showWorkShifthModels = true;
    }

    private function getShiftData(): void
    {
        if ($this->shiftId > 0) {
            $workShift = WorkShift::findOrFail($this->shiftId);
            $this->name = $workShift?->name ?? '';
            $this->shift_code = $workShift?->shift_code ?? '';
            $this->start_time = $workShift?->start_time ?? '';
            $this->end_time = $workShift?->end_time ?? '';

            return;
        }
    }

    public function save(): void
    {
        $data = $this->validate([
            'name' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'shift_code' => 'required|unique:work_shifts,shift_code,'.$this->shiftId,
        ]);

        WorkShift::updateOrCreate(['id' => $this->shiftId], $data);
        $this->reset();
        clearWorkShiftCache();
        $this->dispatch('listrefresh');
    }
}
