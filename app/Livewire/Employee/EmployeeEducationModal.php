<?php

namespace App\Livewire\Employee;

use App\Models\Branch;
use App\Models\UserEducation;
use App\Traits\CountryTrait;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EmployeeEducationModal extends Component
{
    use CountryTrait;

    public int $educationId = 0;
    public int $userId = 0;

    public int $passing_year = 0;

    public int $id = 0;
    public int $gpa = 0;

    public string $degree = '';
    public string $subject = '';
    public string $institute = '';

    public bool $showBranchModal = false;
    public function render()
    {
        return view('livewire.employee.employee-education-modal', [
            'countriesList' => $this->getCountriesList(),
        ]);
    }

    #[On('showBranchModal')]
    public function showBranchModal(int $id = 0): void
    {
        $this->id = $id;
        $this->reset();
        $this->educationId = $id;
        $this->getBranchData();
        $this->showBranchModal = true;
    }

    private function getBranchData(): void
    {
        if ($this->educationId > 0) {
            $branchData = UserEducation::findOrFail($this->educationId);
            $this->passing_year = $branchData?->passing_year ?? '';
            $this->institute = $branchData->institute;
            $this->subject = $branchData->subject;
            $this->degree = $branchData->degree;
            $this->gpa = $branchData->gpa;

            return;
        }
    }

    public function save(): void
    {
        $data['institute'] = $this->institute;
        $data['subject'] = $this->subject;
        $data['degree'] = $this->degree;
        $data['gpa'] = $this->gpa;
        $data['passing_year'] = $this->passing_year;
        $data['user_id'] = 10;

        // dd($data);
        UserEducation::updateOrCreate(['id' => $this->educationId], $data);
        $this->dispatch('listrefresh');
        $this->reset();
        clearBranchCache();
    }
}
