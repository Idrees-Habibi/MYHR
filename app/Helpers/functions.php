<?php

use App\Helpers\AppConstants as AppConst;
use Illuminate\Support\Facades\Cache;

if (! function_exists('testFunction')) {
    /**
     * This is Test function Just to Show you how functions should be defined
     *
     * @param  string  $name  <p><i>Name</i> Should be string.</p>
     * @param  int  $age  <p><i>Age</i> Should be Integer.</p>
     * @param  mixed  $gender  <p><i>Gender</i> Can be mixed.</p>
     * @return array <p>['name', 'age', 'gender', 'user']</p>
     */
    #[ArrayShape(['name' => 'string', 'age' => 'int', 'gender' => 'mixed', 'user' => 'mixed'])]
    function testFunction(string $name, int $age, mixed $gender): array
    {
        try {
            /* Write Code For Operation */
            $user = \App\Models\User::where('name', $name)->get();
        } catch (\Exception $e) {
            /* Handle The Exception */
            logException($e);
        }

        return ['name' => $name, 'age' => $age, 'gender' => $gender, 'user' => $user];
    }
}

if (! function_exists('clearCategoryCache')) {
    function clearCategoryCache()
    {
        Cache::forget(AppConst::ALL_CATEGORIES_WITH_GRADES);
        Cache::forget(AppConst::ALL_GRADES);
        Cache::forget(AppConst::ALL_SUB_GRADES);
        Cache::forget(AppConst::ALL_POSITIONS);
    }
}

if (! function_exists('clearBranchCache')) {
    function clearBranchCache()
    {
        Cache::forget(AppConst::ALL_BRANCHS);
    }
}

if (! function_exists('clearDepartmentCache')) {
    function clearDepartmentCache()
    {
        Cache::forget(AppConst::ALL_DEPARTMENTS);
    }
}

if (! function_exists('clearWorkShiftCache')) {
    function clearWorkShiftCache()
    {
        Cache::forget(AppConst::ALL_WORKSHIFTS);
    }
}

if (! function_exists('clearEmployeeCache')) {
    function clearEmployeeCache()
    {
        Cache::forget(AppConst::ALL_EMPLOYEES);
    }
}

if (! function_exists('clearRCLCache')) {
    function clearRCLCache()
    {
        Cache::forget(AppConst::RCL_NUMBER);
    }
}

if (! function_exists('deleteImage')) {

    function deleteImage(string $imagePath = ''): void
    {
        $imagePath = 'storage/'.$imagePath;
        $fullPath = public_path($imagePath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}
