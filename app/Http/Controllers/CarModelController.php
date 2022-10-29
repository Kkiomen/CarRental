<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarModelRequest;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Service\CarModelService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CarModelController extends Controller
{

    private CarModelService $carModelService;

    public function __construct(CarModelService $carModelService)
    {
        $this->carModelService = $carModelService;
    }

    /**
     * Display a listing of the car model.
     * @return View
     */
    public function index(): View
    {
        return view('carModel.index', [
            'cardBrands' => CarModel::get(),
        ]);
    }


    /**
     * Show the form for creating a new car model.
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        if(CarBrand::count() == 0){
            return Redirect::back()->with('danger', 'You must add at least one car brand');
        }

        return view('carModel.create', [
            'brands' => CarBrand::get(),
        ]);
    }

    /**
     * Store a newly created car model in database.
     * @param CarModelRequest $request
     * @return RedirectResponse
     */
    public function store(CarModelRequest $request): RedirectResponse
    {
        $model = $this->carModelService->store($request);
        if (!$model) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to save data');
        }
        return Redirect::route('auto-model.index')->with('success', 'Successfully save data');
    }


    /**
     * Show the form for editing the specified car model.
     * @param CarModel $auto_model
     * @return View
     */
    public function edit(CarModel $auto_model): View
    {
        return view('carModel.edit', [
            'model' => $auto_model,
            'brands' => CarBrand::get()
        ]);
    }

    /**
     * Update the specified car model in database.
     * @param CarModelRequest $request
     * @param CarModel $auto_model
     * @return RedirectResponse
     */
    public function update(CarModelRequest $request, CarModel $auto_model): RedirectResponse
    {
        $model = $this->carModelService->update($request, $auto_model);
        if (!$model) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to update data');
        }
        return Redirect::back()->with('success', 'Successfully update data');
    }


    /**
     * Remove the car model from database.
     * @param CarModel $auto_model
     * @return RedirectResponse
     */
    public function destroy(CarModel $auto_model): RedirectResponse
    {
        if (!$this->carModelService->delete($auto_model)) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to remove the model');
        }
        return Redirect::back()->with('success', 'Successfully removed model');
    }
}
