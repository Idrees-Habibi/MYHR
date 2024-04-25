<?php

namespace App\Models;

use App\Helpers\AppConstants;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'password',
        'rms_id',
        'first_name',
        'last_name',
        'gender',
        'personal_email',
        'email',
        'cnic',
        'date_of_birth',
        'religion',
        'marital_status',
        'city_id',
        'state_id',
        'current_address',
        'permanent_address',
        'address',
        'primary_contact',
        'secondary_contact',
        'date_of_joining',
        'blood_group',
        'type',
        'rcl_number',
        'branch_id',
        'department_id',
        'profile_photo',
        'expiry_date',
        'tax_number',
        'country_id',
        'role_id',
        'position_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    public function workShifts()
    {
        return $this->belongsToMany(WorkShift::class, 'user_work_shifts');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_user');
    }

    protected function profilePhotoUrl(): Attribute
    {

        return Attribute::make(
            get: fn (?string $value, $attribute) => ! is_null($attribute['profile_photo']) ? Storage::url(AppConstants::PROFILE_IMAGE.'/'.$attribute['profile_photo']) : Storage::url(AppConstants::PROFILE_IMAGE.'/'.'user-profile.svg '),
        );
    }

    public function family(): HasOne
    {
        return $this->hasOne(EmployeeFamily::class);
    }
}
