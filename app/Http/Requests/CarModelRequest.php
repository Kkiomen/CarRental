<?php

namespace App\Http\Requests;

use App\Enums\FuelType;
use App\Enums\GearboxType;
use App\Service\CarBrandService;
use Illuminate\Foundation\Http\FormRequest;

class CarModelRequest extends FormRequest
{


    private CarBrandService $carBrandService;

    /**
     * @param CarBrandService $carBrandService
     */
    public function __construct(CarBrandService $carBrandService)
    {
        $this->carBrandService = $carBrandService;
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'brand_id' => 'required|in:' . $this->carBrandService->getIdListToValidateSelectField(),
            'imageUrl' => 'required|max:255',
            'name' => 'required|max:100',
            'enginePower' => 'required',
            'engineCapacity' => 'required',
            'numberDoors' => 'required|numeric',
            'yearOfProduction' => 'required|numeric|min:1900|max:2099',
            'fuel' => 'required|in:' . implode(',', FuelType::getTypesToArray()),
            'gearbox' => 'required|in:' . implode(',', GearboxType::getTypesToArray()),
        ];
    }
}
