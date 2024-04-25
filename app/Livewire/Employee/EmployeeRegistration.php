<?php

namespace App\Livewire\Employee;

use App\Helpers\AppConstants as AppConst;
use App\Models\EmployeeFamily;
use App\Models\User;
use App\Traits\BranchTrait;
use App\Traits\CategoryTrait;
use App\Traits\CountryTrait;
use App\Traits\DepartmentTrait;
use App\Traits\EmployeeTrait;
use App\Traits\PositionTrait;
use App\Traits\RoleTrait;
use App\Traits\Validation\LivewireRules;
use App\Traits\WorkShiftTrait;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeeRegistration extends Component
{
    use BranchTrait;
    use CategoryTrait;
    use CountryTrait;
    use DepartmentTrait;
    use EmployeeTrait;
    use LivewireRules;
    use PositionTrait;
    use RoleTrait;
    use WithFileUploads;
    use WorkShiftTrait;

    public string $first_name = '';

    public string $last_name = '';

    public string $password = '';

    public string $gender = '';

    public string $personal_email = '';

    public string $email = '';

    public string $cnic = '';

    public string $date_of_birth = '';

    public string $religion = '';

    public string $marital_status = '';

    public int $city_id = 0;

    public int $state_id = 0;

    public string $address = '';

    public string $current_address = '';

    public string $primary_contact = '';

    public string $secondary_contact = '';

    public string $date_of_joining = '';

    public string $blood_group = '';

    public string $type = '';

    public string $expiry_date = '';

    public string $tax_number = '';

    public int $branch_id = 0;

    public int $department_id = 0;

    public int $position_id = 0;

    public int $id = 0;

    public int $work_shift_id = 0;

    public string $profile_image_path = '';

    public int $country_id = 0;

    public int $role_id = 0;

    public string $rcl_number = '';

    public $profile_photo;

    public string $spouse_name = '';

    public string $spouse_dob = '';

    public string $spouse_cnic = '';

    public string $spouse_type = '';

    public string $permanent_address = '';

    public function mount(int $id = 0): void
    {
        $this->id = $id;

        if ($id > 0) {
            $employee = User::findOrFail($id);

            foreach ($employee->toArray() as $key => $value) {
                if ($key === 'profile_photo') {
                    $this->profile_image_path = $employee->profile_photo_url;
                } elseif ($key === 'password') {
                    $this->password = '';
                } else {
                    if (property_exists($this, $key)) {
                        $this->$key = $value;
                    }
                }
            }
        }
    }


    public function render(): \Illuminate\View\View
    {
        $this->authorize('authorize', $this->id > 0 ? AppConst::EDIT_EMPLOYEE : AppConst::CREATE_EMPLOYEE);

        return view('livewire.employee.employee-registration', [

            'getbranches' => $this->getAllBranches(0),
            'getdepartments' => $this->getBranchDepartments($this->branch_id),
            'getworkshifts' => $this->getAllWorkShifts(0),
            'getcountries' => $this->getCountriesList(0),
            'getStates' => $this->getCountryStates($this->country_id),
            'getCities' => $this->getStateCities($this->state_id),
            'getAllRoles' => $this->getEmployeeRoles(0),
            'getAllPositions' => $this->getAllPositions(),
            'getMemberType' => $this->employeeFamily(),
            'getEmployeeType' => $this->getAllEmployeeType(),
            'getBloodGroupType' => $this->getBloodGroup(),

        ]);

    }

    private function storeProfilePhoto(): string
    {
        $profilePhotoName = $this->profile_photo->getClientOriginalName();
        $this->profile_photo->storePubliclyAs(AppConst::PROFILE_IMAGE, $profilePhotoName, 'public');

        return $profilePhotoName;
    }



    public function save()
    {
        $validatedData = $this->validate($this->getEmployeeRules($this->id));

        if ($this->id == 0) {
            $validatedData['rcl_number'] = AppConst::RCL_CODE.$this->getRCLNumber();
        }

        if ($this->password) {
            $validatedData['password'] = Hash::make($this->password);
        }

        if ($this->profile_photo) {
            if ($this->id > 0) {
                deleteImage(AppConst::PROFILE_IMAGE.'/'.$this->profile_photo);
            }
            $profilePhotoName = $this->storeProfilePhoto();

            $validatedData['profile_photo'] = $profilePhotoName;

        }

        $user = User::updateOrCreate(['id' => $this->id], $validatedData);
        if ($this->marital_status == AppConst::MARRIED) {
            $this->storeFamilyInfo($user?->id);
        }

        if ($this->work_shift_id) {
            $user->workShifts()->sync([$this->work_shift_id]);
        }

        $this->reset();

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => 'Employee '.($this->id ? 'updated' : 'created').' successfully.',
        ]);

        clearEmployeeCache();
        clearRCLCache();

        return redirect()->route('employees');
    }

    private function storeFamilyInfo($id)
    {
        EmployeeFamily::create([
            'user_id' => $id,
            'name' => $this->spouse_name,
            'cnic' => $this->spouse_cnic,
            'date_of_birth' => $this->spouse_dob,
            'type' => $this->spouse_type,

        ]);
    }
}
