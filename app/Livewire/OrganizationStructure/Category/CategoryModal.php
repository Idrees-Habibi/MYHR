<?php

namespace App\Livewire\OrganizationStructure\Category;

use App\Helpers\AppConstants as AppConst;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryModal extends Component
{
    public bool $showCategoryModal = false;

    public int $categoryId = 0;

    public int $id = 0;

    #[Validate('required')]
    public string $name = '';

    public function render()
    {
        return view('livewire.organization-structure.category.category-modal');
    }

    #[On('showCategoryModal')]
    public function showCategoryModal(int $id = 0): void
    {
        $this->id = $id;
        $this->authorize('authorize', $this->id > 0 ? AppConst::EDIT_CATEGORIES : AppConst::CREATE_CATEGORIES);

        $this->reset();
        $this->categoryId = $id;
        $this->getCategoryData($id);
        $this->showCategoryModal = true;
    }

    private function getCategoryData(int $categoryId = 0): void
    {
        if ($categoryId > 0) {
            $category = Category::findOrFail($categoryId);
            $this->name = $category->name;

            return;
        }
    }

    public function save(): void
    {
        $data = $this->validate();
        Category::updateOrCreate(['id' => $this->categoryId], $data);
        $this->reset();
        $this->dispatch('listrefresh');
        clearCategoryCache();
    }
}
