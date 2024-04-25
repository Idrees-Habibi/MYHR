<?php

namespace App\Traits;

use App\Helpers\AppConstants as AppConst;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

trait CountryTrait
{
    private function getCountriesList(): array
    {
        return collect(Country::all() ?? [])->map(fn ($item) => [
            'label' => $item->name,
            'value' => $item->id,
        ])->merge([])
            ->unique()
            ->toArray();
    }

    public function getAllCountries(int $perPage = 10): LengthAwarePaginator|Collection
    {
        if ($perPage == 0) {
            return Cache::rememberForever(AppConst::ALL_COUNTRIES, function () {
                return Country::get();
            });
        }

        return Country::paginate($perPage);
    }

    public function getCountryStates(int $countryId = 0)
    {

        return State::where('country_id', $countryId)->get();
    }

    public function getStateCities(int $stateId = 0)
    {
        // dd( City::where('state_id', $stateId)->get());
        return City::where('state_id', $stateId)->get();
    }
}
