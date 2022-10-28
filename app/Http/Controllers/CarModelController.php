<?php

namespace App\Http\Controllers;

use App\Enums\FuelType;
use App\Enums\GearboxType;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Service\CarBrandService;
use App\Service\CarModelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarModelController extends Controller
{

    private CarBrandService $carBrandService;
    private CarModelService $carModelService;

    public function __construct(CarBrandService $carBrandService, CarModelService $carModelService)
    {
        $this->carBrandService = $carBrandService;
        $this->carModelService = $carModelService;
    }

    public function index()
    {
        $cardBrands = CarModel::get();
        return view('carModel.index', [
            'cardBrands' => $cardBrands
        ]);
    }

    public function create()
    {
        $brands = CarBrand::get();
        return view('carModel.create', [
            'brands' => $brands
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'carBrand' => 'required|in:' . $this->carBrandService->getIdListToValidateSelectField(),
            'modelImageUrl' => 'required|max:255',
            'modelName' => 'required|max:100',
            'enginePower' => 'required',
            'engineCapacity' => 'required',
            'numberDoors' => 'required|numeric',
            'yearOfProduction' => 'required|numeric|min:1900|max:2099',
            'fuelType' => 'required|in:' . implode(',', FuelType::getTypesToArray()),
            'gearboxType' => 'required|in:' . implode(',', GearboxType::getTypesToArray()),
        ]);
        $model = $this->carModelService->store($request);
        if (!$model) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to save data');
        }
        return Redirect::route('auto-model.index')->with('success', 'Successfully save data');
    }


    public function edit($id)
    {
        $model = CarModel::find($id);
        if (!$model) {
            return Redirect::back()->with('danger', 'Such a model does not exist');
        }

        $brands = CarBrand::get();
        return view('carModel.edit', [
            'model' => $model,
            'brands' => $brands
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'carBrand' => 'required|in:' . $this->carBrandService->getIdListToValidateSelectField(),
            'modelImageUrl' => 'required|max:255',
            'modelName' => 'required|max:100',
            'enginePower' => 'required',
            'engineCapacity' => 'required',
            'numberDoors' => 'required|numeric',
            'yearOfProduction' => 'required|numeric|min:1900|max:2099',
            'fuelType' => 'required|in:' . implode(',', FuelType::getTypesToArray()),
            'gearboxType' => 'required|in:' . implode(',', GearboxType::getTypesToArray()),
        ]);

        $model = $this->carModelService->update($request, $id);
        if (!$model) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to update data');
        }
        return Redirect::back()->with('success', 'Successfully update data');
    }


    public function destroy($id)
    {
        if (!$this->carModelService->delete($id)) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to remove the model');
        }
        return Redirect::back()->with('success', 'Successfully removed model');
    }
}
