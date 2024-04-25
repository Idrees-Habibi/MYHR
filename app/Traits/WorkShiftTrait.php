<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\WorkShift;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

trait WorkShiftTrait
{
    public function getAllWorkShifts(int $perPage = 10): LengthAwarePaginator|Collection
    {
        if ($perPage == 0) {
            return Cache::rememberForever(AppConst::ALL_WORKSHIFTS, function () {
                return WorkShift::all();
            });
        }

        return WorkShift::all()->paginate($perPage);
    }
}
