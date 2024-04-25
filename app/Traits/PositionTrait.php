<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

trait PositionTrait
{
    public function getAllPositions(): Collection
    {
        return Cache::rememberForever(AppConst::ALL_POSITIONS, function () {
            return Position::all();
        });
    }

    public function getPositions(int $perPage = 10): LengthAwarePaginator|Collection
    {
        if ($perPage == 0) {
            return Cache::rememberForever(AppConst::ALL_POSITIONS, function () {
                return Position::all();
            });
        }

        return Position::orderBy('id', 'desc')->paginate($perPage);
    }
}
