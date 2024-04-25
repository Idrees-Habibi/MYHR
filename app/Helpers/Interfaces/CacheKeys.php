<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\CacheKeys.
 *
 * */
interface CacheKeys
{
    public const ROLE = 'role';

    public const ROLE_PERMISSIONS = self::ROLE.'-permissions';

    public const PARENT_LABELS = 'parent-labels';

    public const ROLE_SIDE_BAR = self::ROLE.'-side-bar';

    public const ALL_ROLES = 'all-roles';

    public const GENERAL_SETTINGS = 'general-settings';

    public const ALL_CATEGORIES_WITH_GRADES = 'all-categories-with-grades';

    public const ALL_GRADES = 'all-grades';

    public const ALL_SUB_GRADES = 'all-subgrades';

    public const ALL_POSITIONS = 'all-positions';

    public const ALL_BRANCHS = 'all-branchs';

    public const ALL_COUNTRIES = 'all-countries';

    public const ALL_DEPARTMENTS = 'all-departments';

    public const ALL_WORKSHIFTS = 'all-workshifts';

    public const ALL_EMPLOYEES = 'all-employees';

    public const ALL_EMPLOYEES_TYPES = 'all-employees-types';

    public const RCL_NUMBER = 'rcl-number';
}
