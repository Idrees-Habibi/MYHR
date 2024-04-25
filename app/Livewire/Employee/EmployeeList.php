<?php

namespace App\Livewire\Employee;

use App\Helpers\AppConstants as AppConst;
use App\Models\User;
use App\Traits\EmployeeTrait;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    use EmployeeTrait;
    use WithPagination;

    public int $id = 0;

    public function render()
    {

        $this->authorize('authorize', AppConst::EMPLOYEE_LISTING);

        return view('livewire.employee.employee-list', [
            'allEmployees' => $this->getAllEmployees(AppConst::PER_PAGE),
        ]);
    }

    public function deleteEmployee(int $id = 0)
    {
        $employee = User::findOrFail($id);

        $employee->workShifts()->detach();
        $employee->departments()->detach();
        if ($employee->profile_photo) {


            deleteImage(AppConst::PROFILE_IMAGE.'/'.$employee->profile_photo);

        }

        $employee->delete();
        $this->reset();
        clearEmployeeCache();

        $this->dispatch('alert', param: ['type' => 'danger', 'message' => 'Employee deleted Successfully']);
    }
}
