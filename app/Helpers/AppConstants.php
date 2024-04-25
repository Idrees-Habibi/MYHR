<?php

namespace App\Helpers;

use App\Helpers\Interfaces\CacheKeys;
use App\Helpers\Interfaces\EmployeeType;
use App\Helpers\Interfaces\Paths;
use App\Helpers\Interfaces\Permissions;
use App\Helpers\Interfaces\Roles;
use App\Helpers\Interfaces\SubModules;

class AppConstants implements CacheKeys, EmployeeType, Paths, Permissions, Roles, SubModules
{
    public const PER_PAGE = 10;

    public const MARRIED = 'married';
}
