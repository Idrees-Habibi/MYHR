<?php

namespace App\Livewire\OrganizationStructure\Grade;

use App\Helpers\AppConstants as AppConst;
use App\Models\Category;
use App\Models\Grade;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditGradeModal extends Component
{
    public bool $showGradeModal = false;

    public int $gradeId = 0;

    public string $selectedCategoryName = '';

    public mixed $parentGradeId = 0;

    public int $categoryId = 0;

    public string $parentGradeName = '';

    #[Validate('required')]
    public string $name = '';

    public function render()
    {
        return view('livewire.organization-structure.grade.edit-grade-modal');
    }

    #[On('showGradeModal')]
    public function showGradeModal(int $subGradeId = 0, int $employee_category_id = 0, int $gradeId = 0): void
    {
        if ($subGradeId > 0) {
            $this->authorize('authorize', AppConst::EDIT_GRADES);
        } else {
            $this->authorize('authorize', AppConst::CREATE_GRADES);
        }

        $this->reset();
        $this->parentGradeId = $gradeId;
        if ($this->parentGradeId != 0) {
            $this->parentGradeName = Grade::findOrFail($this->parentGradeId)->name;
        }
        $this->categoryId = $employee_category_id;
        $this->gradeId = $subGradeId;
        $this->getGradeData();
        $this->showGradeModal = true;
    }

    private function getGradeData(): void
    {

        if ($this->gradeId > 0) {
            $grade = Grade::with('category')->findOrFail($this->gradeId);
            $this->name = $grade?->name ?? '';
            $this->selectedCategoryName = $grade?->category?->name ?? '';

            return;
        } else {
            $this->selectedCategoryName = Category::find($this->categoryId)->name ?? '';

        }
    }

    public function saveGrade(): void
    {
        $data = $this->validate();
        $data['category_id'] = $this->categoryId;
        $data['parent_id'] = $this->parentGradeId == 0 ? null : $this->parentGradeId;
        Grade::updateOrCreate(['id' => $this->gradeId], $data);
        $this->reset();
        $this->dispatch('listrefresh');
        clearCategoryCache();
    }
}
