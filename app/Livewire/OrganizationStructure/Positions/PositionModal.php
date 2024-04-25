<?php

namespace App\Livewire\OrganizationStructure\Positions;

use App\Helpers\AppConstants as AppConst;
use App\Models\Grade;
use App\Models\Position;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PositionModal extends Component
{
    public bool $showPositionModel = false;

    public int $positionId = 0;

    public int $subGradeId = 0;

    public int $gradeId = 0;

    public int $id = 0;

    public string $selectedGradeName = '';

    #[Validate('required')]
    public string $name = '';

    public function render()
    {
        return view('livewire.organization-structure.positions.position-modal');
    }

    #[On('showPositionModal')]
    public function showPositionModal(int $id = 0, int $subGrade_id = 0): void
    {
        $this->id = $id;
        $this->authorize('authorize', $this->id > 0 ? AppConst::EDIT_POSITIONS : AppConst::CREATE_POSITIONS);

        $this->reset();
        $this->positionId = $id;
        $this->subGradeId = $subGrade_id;
        $this->getPositionData($id);
        $this->showPositionModel = true;
    }

    private function getPositionData(int $positionId = 0): void
    {
        if ($positionId > 0) {
            $position = Position::with('grade')->findOrFail($positionId);
            $this->name = $position->name;
            $this->selectedGradeName = $position->grade->name;
            $this->gradeId = $position->grade->id;

            return;
        } else {

            $position = Grade::findOrFail($this->subGradeId);
            $this->gradeId = $position->id;
        }
    }

    public function savePosition(): void
    {
        $data = $this->validate();
        $data['grade_id'] = $this->gradeId;
        Position::updateOrCreate(['id' => $this->positionId], $data);
        $this->reset();
        $this->dispatch('listrefresh');
        clearCategoryCache();
    }
}
