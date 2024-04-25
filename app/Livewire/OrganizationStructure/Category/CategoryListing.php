<?php

namespace App\Livewire\OrganizationStructure\Category;

use App\Helpers\AppConstants as AppConst;
use App\Models\Category;
use App\Models\Grade;
use App\Models\Position;
use App\Traits\CategoryTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryListing extends Component
{
    use CategoryTrait;

    public bool $showDeleteModal = false;

    public int $deleteRecordId = 0;

    public string $flag = '';

    public function render()
    {
        $this->authorize('authorize', AppConst::VIEW_CATEGORIES_LISTING);

        return view(
            'livewire.organization-structure.category.category-listing',
            [
                'categories' => $this->getAllCategoryGradesPositions(),
            ]
        );
    }

    #[On('listrefresh')]
    public function listrefresh(): void
    {

    }

    public function deleteModal(int $id = 0, string $flag = ''): void
    {

        $this->deleteRecordId = $id;
        $this->flag = $flag;
        $this->showDeleteModal = true;
    }

    public function deleteRecord(): void
    {
        switch ($this->flag) {
            case 'category':
                $this->deleteCategory();
                break;
            case 'grade':
                $this->deleteGrade();
                break;
            case 'subgrade':
                $this->deleteSubgrade();
                break;
            case 'position':
                $this->deletePosition();
                break;
        }

        $this->reset();
        clearCategoryCache();
    }

    private function deleteCategory(): void
    {
        $category = Category::findOrFail($this->deleteRecordId);
        foreach ($category->grades as $grade) {
            $this->deleteGradeRelations($grade);
        }
        $category->grades()->delete();
        $category->delete();
    }

    private function deleteGrade(): void
    {
        $grade = Grade::findOrFail($this->deleteRecordId);
        $this->deleteGradeRelations($grade);
        $grade->delete();
    }

    private function deleteSubgrade(): void
    {
        $subgrade = Grade::findOrFail($this->deleteRecordId);
        $subgrade->positions()->delete();
        $subgrade->delete();
    }

    private function deletePosition(): void
    {
        Position::destroy($this->deleteRecordId);
    }

    private function deleteGradeRelations($grade): void
    {
        foreach ($grade->subGrades as $subGrade) {
            $subGrade->positions()->delete();
        }

        $grade->subGrades()->delete();
    }
}
