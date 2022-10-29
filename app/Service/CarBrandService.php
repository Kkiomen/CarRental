<?php

namespace App\Service;

use App\Http\Requests\CarBrandRequest;
use App\Models\CarBrand;

class CarBrandService
{
    /**
     * Store a newly created car brand in database.
     * @param CarBrandRequest $request
     * @return CarBrand
     */
    public function store(CarBrandRequest $request): CarBrand
    {
        $brand = new CarBrand($request->all());
        $brand->save();
        return $brand;
    }

    /**
     * Update the specified car brand in database.
     * @param CarBrandRequest $request
     * @param CarBrand $auto_brand
     * @return CarBrand|null
     */
    public function update(CarBrandRequest $request, CarBrand $auto_brand): ?CarBrand
    {
        try {
            $auto_brand->fill($request->all());
            $auto_brand->save();
            return $auto_brand;
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * Remove the car brand from database.
     * @param CarBrand $auto_brand
     * @return bool
     */
    public function delete(CarBrand $auto_brand): bool
    {
        try {
            $auto_brand->delete();
        } catch (\Exception $exception) {
            return false;
        }
        return true;
    }

    /**
     * Getting a list of id car brands (after the comma)
     * @return string
     */
    public function getIdListToValidateSelectField(): string
    {
        $brands = CarBrand::get()->toArray();
        $brands = array_map(function ($brand) {
            return $brand['id'];
        }, $brands);
        return implode(',', $brands);
    }
}
