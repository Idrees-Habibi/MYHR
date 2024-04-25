<?php

namespace App\Traits\Validation;

use Illuminate\Validation\Rule;

trait LivewireRules
{
    public function getEmployeeRules(int $id = 0): array
    {
        $baseRules = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'cnic' => 'required|regex:/^[-0-9]{1,20}$/',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'sometimes',
            'city_id' => 'required',
            'state_id' => 'required',
            'permanent_address' => 'required',
            'current_address' => 'required|min:5',
            'primary_contact' => 'required|regex:/^\+?\d{8,20}$/',
            'secondary_contact' => 'required|regex:/^\+?\d{8,20}$/',
            'date_of_joining' => 'required|date',
            'blood_group' => 'sometimes',
            'type' => 'required',
            'work_shift_id' => 'nullable|integer',
            'branch_id' => 'required',
            'department_id' => 'required',
            'country_id' => 'required',
            'role_id' => 'required',
            'position_id' => 'required',
            'expiry_date' => 'required|date',
            'tax_number' => 'sometimes',
        ];

        $baseRules['email'] = ['required','email',Rule::unique('users')->ignore($id),];
        $baseRules['personal_email'] = ['required','email',Rule::unique('users')->ignore($id),];

        return $baseRules;
    }
}
