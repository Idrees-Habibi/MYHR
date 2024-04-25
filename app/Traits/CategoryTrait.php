<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

trait CategoryTrait
{
    public function getAllCategoryGradesPositions(): Collection
    {
        return Cache::rememberForever(AppConst::ALL_CATEGORIES_WITH_GRADES, function () {
            return Category::with(['grades.subGrades.positions'])->get();
        });
    }
}
