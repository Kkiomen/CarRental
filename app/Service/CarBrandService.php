<?php

namespace App\Service;

use App\Models\CarBrand;
use Illuminate\Http\Request;

class CarBrandService
{
    public function store(Request $request): CarBrand
    {
        $brand = new CarBrand();
        $brand->imageUrl = $request->input('brandImageUrl');
        $brand->name = $request->input('brandName');
        $brand->save();

        return $brand;
    }

    public function update(Request $request, $id): ?CarBrand
    {
        try {
            $brand = CarBrand::findOrFail($id);
            $brand->imageUrl = $request->input('brandImageUrl');
            $brand->name = $request->input('brandName');
            $brand->save();
        } catch (\Exception $exception) {
            $brand = null;
        }

        return $brand;
    }

    public function delete(int $id): bool
    {
        try {
            $brand = CarBrand::findOrFail($id);
            $brand->delete();
        } catch (\Exception $exception) {
            return false;
        }
        return true;
    }

    public function getIdListToValidateSelectField(): string
    {
        $brands = CarBrand::get()->toArray();
        $brands = array_map(function ($brand) {
            return $brand['id'];
        }, $brands);
        return implode(',', $brands);
    }
}
