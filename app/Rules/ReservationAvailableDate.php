<?php

namespace App\Rules;

use App\Service\ReservationService;
use Illuminate\Contracts\Validation\Rule;

class ReservationAvailableDate implements Rule
{

    private $dateStart;
    private $model_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($dateStart, $model_id)
    {
        $this->dateStart = $dateStart;
        $this->model_id = $model_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ReservationService::checkDatesAreAvailable($this->dateStart, $value, $this->model_id);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The car has already been booked on these dates';
    }
}
