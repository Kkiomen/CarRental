<?php

namespace App\Http\Requests;

use App\Rules\ReservationAvailableDate;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
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
            'date_from' => 'required|date|after:now',
            'date_to' => ['required', 'date', 'after:date_from', new ReservationAvailableDate($this->input('date_from'), $this->input('model_id'))],
            'firstname' => 'required|max:100',
            'secondname' => 'required|max:150',
            'email' => 'required|email|max:150',
        ];
    }
}
