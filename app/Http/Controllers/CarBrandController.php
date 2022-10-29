<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarBrandRequest;
use App\Models\CarBrand;
use App\Service\CarBrandService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CarBrandController extends Controller
{

    private CarBrandService $carBrandService;

    public function __construct(CarBrandService $carBrandService)
    {
        $this->carBrandService = $carBrandService;
    }


    /**
     * Display a listing of the car brand.
     * @return View
     */
    public function index(): View
    {
        return view('carBrand.index', [
            'carBrands' => CarBrand::get(),
        ]);
    }


    /**
     * Show the form for creating a new car brand.
     * @return View
     */
    public function create(): View
    {
        return view('carBrand.create');
    }


    /**
     * Store a newly created car brand in database.
     * @param CarBrandRequest $request
     * @return RedirectResponse
     */
    public function store(CarBrandRequest $request): RedirectResponse
    {
        $brand = $this->carBrandService->store($request);
        if (!$brand) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to save data');
        }
        return Redirect::route('auto-brand.index')->with('success', 'Successfully added auto brand');
    }


    /**
     * Show the form for editing the specified car brand.
     * @param CarBrand $auto_brand
     * @return View
     */
    public function edit(CarBrand $auto_brand): View
    {
        return view('carBrand.edit', [
            'brand' => $auto_brand
        ]);
    }


    /**
     * Update the specified car brand in database.
     * @param CarBrandRequest $request
     * @param CarBrand $auto_brand
     * @return RedirectResponse
     */
    public function update(CarBrandRequest $request, CarBrand $auto_brand): RedirectResponse
    {

        $brand = $this->carBrandService->update($request, $auto_brand);
        if (!$brand) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to update data');
        }
        return Redirect::back()->with('success', 'Successfully updated data');
    }


    /**
     * Remove the car brand from database.
     * @param CarBrand $auto_brand
     * @return RedirectResponse
     */
    public function destroy(CarBrand $auto_brand): RedirectResponse
    {
        if (!$this->carBrandService->delete($auto_brand)) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to remove the brand');
        }
        return Redirect::back()->with('success', 'Successfully removed the element');
    }


}
