<?php

namespace App\Helpers\Interfaces;

interface EmployeeType
{
    public const EMPLOYEE_TYPES = [
        1 => 'probationary-employee',
        2 => 'permanent-employee',
        3 => 'part_time-employee',
        4 => 'contractual-employee',
        5 => 'internee',
    ];

    public const RCL_CODE = 'rcl-';

    public const FAMILY_MEMBER = [
        1 => 'husband',
        2 => 'wife',
        3 => 'kid',
    ];

    public const BLOOD_GROUP = [
        1 => 'A+',
        2 => 'A-',
        3 => 'B+',
        4 => 'B-',
        5 => 'AB+',
        6 => 'AB-',
        7 => 'O+',
        8 => 'O-',

    ];
}
