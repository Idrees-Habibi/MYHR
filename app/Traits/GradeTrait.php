<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

trait GradeTrait
{
    public function getParentGrades(): Collection
    {
        return Cache::rememberForever(AppConst::ALL_GRADES, function () {
            return Grade::whereNull('parent_id')->get();
        });
    }

    public function getSubgrades(): Collection
    {
        return Cache::rememberForever(AppConst::ALL_SUB_GRADES, function () {
            return Grade::whereNotNull('parent_id')->get();
        });
    }
}
