<?php

use App\Livewire\Employee\Dashboard\Index as DashboardIndex;
use App\Livewire\Employee\EmployeeEducationListing;
use App\Livewire\Employee\EmployeeList;
use App\Livewire\Employee\EmployeeRegistration;
use App\Livewire\Login;
use App\Livewire\OrganizationStructure\Branch\BranchList;
use App\Livewire\OrganizationStructure\Category\CategoryListing;
use App\Livewire\OrganizationStructure\Department\DepartmentList;
use App\Livewire\OrganizationStructure\WorkShift\WorkShiftListing;
use App\Livewire\Settings\ManagePermissions\CreatePermissions;
use App\Livewire\Settings\ManageRole\RoleListing;
use App\Livewire\Settings\ManageRole\RolePermissions;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

if (config('app.env') !== 'prod') {
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post(config('app.url').'/livewire/update', $handle);
    });
    Livewire::setScriptRoute(function ($handle) {
        return Route::get(config('app.url').'/livewire/livewire.js', $handle);
    });
}

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('login', Login::class)->name('login')->middleware('guest:agent');
Route::middleware(['auth'])->group(function () {
    Route::get('/', EmployeeList::class)->name('employees');
    Route::get('/index', RoleListing::class)->name('roles');
    Route::get('/permissions', CreatePermissions::class)->name('permissions');
    Route::get('/role-permissions/{roleId}', RolePermissions::class)->name('role.permissions');
    Route::get('/employee-registration/{id?}', EmployeeRegistration::class)->name('employee.edit');
    Route::get('/organization/department', DepartmentList::class)->name('departments');
    Route::get('/organization/branch', BranchList::class)->name('branches');
    Route::get('/organization/workshifts', WorkShiftListing::class)->name('workshifts');
    Route::get('/organization/category', CategoryListing::class)->name('categories');
    Route::get('/test', EmployeeEducationListing::class)->name('categories');
});
