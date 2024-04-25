<?php

namespace App\Livewire\OrganizationStructure\Branch;

use App\Helpers\AppConstants as AppConst;
use App\Models\Branch;
use App\Traits\CountryTrait;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditBranchModal extends Component
{
    use CountryTrait;

    #[Validate('required')]
    public string $name = '';

    public int $brnachId = 0;

    public int $countryId = 0;

    public int $id = 0;

    public string $address = '';

    public bool $showBranchModal = false;

    public function render()
    {
        return view('livewire.organization-structure.branch.edit-branch-modal', [
            'countriesList' => $this->getCountriesList(),
        ]);
    }

    #[On('showBranchModal')]
    public function showBranchModal(int $id = 0): void
    {
        $this->id = $id;

        $this->authorize('authorize', $this->id > 0 ? AppConst::EDIT_BRANCHES : AppConst::CREATE_BRANCHES);

        $this->reset();
        $this->brnachId = $id;
        $this->getBranchData();
        $this->showBranchModal = true;
    }

    private function getBranchData(): void
    {
        if ($this->brnachId > 0) {
            $branchData = Branch::findOrFail($this->brnachId);
            $this->name = $branchData?->name ?? '';
            $this->address = $branchData->address;
            $this->countryId = $branchData->country_id;

            return;
        }
    }

    public function save(): void
    {
        $data = $this->validate();
        $data['country_id'] = $this->countryId;
        $data['address'] = $this->address;
        Branch::updateOrCreate(['id' => $this->brnachId], $data);
        $this->dispatch('listrefresh');
        $this->reset();
        clearBranchCache();
    }
}
