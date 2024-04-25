<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

trait BranchTrait
{
    public function getAllBranches(int $perPage = 10): LengthAwarePaginator|Collection
    {
        if ($perPage == 0) {
            return Cache::rememberForever(AppConst::ALL_BRANCHS, function () {
                return Branch::with('country')->get();
            });
        }

        return Branch::with('country')->paginate($perPage);
    }

    public function getBranchesList(): array
    {
        return collect(Branch::all() ?? [])->map(fn ($item) => [
            'label' => $item->name,
            'value' => $item->id,
        ])->merge([])
            ->unique()
            ->toArray();
    }
}
