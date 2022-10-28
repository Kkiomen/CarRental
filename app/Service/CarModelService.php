<?php

namespace App\Service;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelService
{

    public function completionField(CarModel $model, Request $request): CarModel
    {
        $model->name = $request->input('modelName');
        $model->imageUrl = $request->input('modelImageUrl');
        $model->enginePower = $request->input('enginePower');
        $model->engineCapacity = $request->input('engineCapacity');
        $model->numberDoors = $request->input('numberDoors');
        $model->yearOfProduction = $request->input('yearOfProduction');
        $model->fuel = $request->input('fuelType');
        $model->gearbox = $request->input('gearboxType');
        $model->airbags = $request->input('numberAirbags');
        $model->abs = $request->boolean('abs');
        $model->electricWindows = $request->boolean('electricWindows');
        $model->electricMirrors = $request->boolean('electricMirrors');
        $model->heatedMirrors = $request->boolean('heatedMirrors');
        $model->centralLocking = $request->boolean('centralLocking');

        return $model;
    }


    public function store(Request $request): ?CarModel
    {
        try {
            $brand = CarBrand::findOrFail($request->input('carBrand'));
            $model = new CarModel();
            $model->brand_id = $brand->id;
            $model = $this->completionField($model, $request);
            $model->save();

            return $model;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function update(Request $request, $id): ?CarModel
    {
        try {
            $brand = CarBrand::findOrFail($request->input('carBrand'));

            $model = CarModel::findOrFail($id);
            $model->brand_id = $brand->id;
            $model = $this->completionField($model, $request);
            $model->save();

            return $model;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public function delete($id): bool
    {
        try {
            $model = CarModel::findOrFail($id);
            $model->delete();
        } catch (\Exception $exception) {
            return false;
        }
        return true;
    }
}
