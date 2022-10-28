<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Service\CarBrandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarBrandController extends Controller
{

    private CarBrandService $carBrandService;

    public function __construct(CarBrandService $carBrandService)
    {
        $this->carBrandService = $carBrandService;
    }


    public function index()
    {
        $carBrands = CarBrand::get();
        return view('carBrand.index', [
            'carBrands' => $carBrands
        ]);
    }


    public function create()
    {
        return view('carBrand.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'brandImageUrl' => 'required|max:255',
            'brandName' => 'required|max:255',
        ]);

        $this->carBrandService->store($request);
        return Redirect::route('auto-brand.index')->with('success', 'Successfully added auto brand');
    }


    public function edit($id)
    {
        $brand = CarBrand::find($id);
        if (!$brand) {
            return Redirect::back()->with('danger', 'Such a brand does not exist');
        }

        return view('carBrand.edit', [
            'brand' => $brand
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'brandImageUrl' => 'required|max:255',
            'brandName' => 'required|max:255',
        ]);

        $brand = $this->carBrandService->update($request, $id);
        if (!$brand) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to update data');
        }

        return Redirect::back()->with('success', 'Successfully updated data');
    }


    public function destroy($id)
    {
        if (!$this->carBrandService->delete($id)) {
            return Redirect::back()->with('danger', 'An error occurred: Failed to remove the brand');
        }
        return Redirect::back()->with('success', 'Successfully removed the element');
    }


}
