<?php

namespace App\Helpers\Interfaces;

/**
 * App\Helpers\Interfaces\Permissions.
 *
 * */
interface Permissions
{
    public const VIEW_GENERAL_SETTINGS = 'view-general-settings';

    public const VIEW_ORGANIZATION_SETTINGS = 'view-organization-settings';

    public const VIEW_ROLES_LISTING = 'view-roles-listing';

    public const CREATE_ROLES = 'create-roles';

    public const EDIT_ROLES = 'edit-roles';

    public const VIEW_PERMISSIONS_LISTING = 'view-permissions-listing';

    public const CREATE_PERMISSIONS = 'create-permissions';

    public const EDIT_PERMISSIONS = 'edit-permissions';

    public const ROLE_HAS_PERMISSIONS = 'role-has-permissions';

    public const VIEW_DEPARTMENT_LISTING = 'view-department-listing';

    public const CREATE_DEPARTMENTS = 'create-departments';

    public const EDIT_DEPARTMENTS = 'edit-departments';

    public const VIEW_BRANCHES_LISTING = 'view-branches-listing';

    public const CREATE_BRANCHES = 'create-branches';

    public const EDIT_BRANCHES = 'edit-branches';

    public const VIEW_WORK_SHIFTS_LISTING = 'view-work-shifts-listing';

    public const CREATE_WORK_SHIFTS = 'create-work-shifts';

    public const EDIT_WORK_SHIFTS = 'edit-work-shifts';

    public const VIEW_CATEGORIES_LISTING = 'view-categories-listing';

    public const CREATE_CATEGORIES = 'create-categories';

    public const EDIT_CATEGORIES = 'edit-categories';

    public const CREATE_GRADES = 'create-grades';

    public const EDIT_GRADES = 'edit-grades';

    public const CREATE_POSITIONS = 'create-positions';

    public const EDIT_POSITIONS = 'edit-positions';

    public const CREATE_EMPLOYEE = 'create-employee';

    public const EDIT_EMPLOYEE = 'edit-employee';

    public const EMPLOYEE_LISTING = 'employee-listing';
}
