<?php

namespace App\Service;

use App\Http\Requests\CarModelRequest;
use App\Models\CarBrand;
use App\Models\CarModel;
class CarModelService
{


    /**
     * Store a newly created car model in database.
     * @param CarModelRequest $request
     * @return CarModel|null
     */
    public function store(CarModelRequest $request): ?CarModel
    {
        try {
            $brand = CarBrand::findOrFail($request->input('brand_id'));
            $carModel = new CarModel($request->all());
            $carModel->brand_id = $brand->id;
            $carModel->save();
            return $carModel;
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * Update the specified car model in database.
     * @param CarModelRequest $request
     * @param CarModel $carModel
     * @return CarModel|null
     */
    public function update(CarModelRequest $request, CarModel $carModel): ?CarModel
    {
        try {
            $brand = CarBrand::findOrFail($request->input('brand_id'));
            $carModel->fill($request->all());
            $carModel->brand_id = $brand->id;
            $carModel->save();

            return $carModel;
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * Remove the car model from database.
     * @param CarModel $auto_model
     * @return bool
     */
    public function delete(CarModel $auto_model): bool
    {
        try {
            $auto_model->delete();
        } catch (\Exception $exception) {
            return false;
        }
        return true;
    }
}
