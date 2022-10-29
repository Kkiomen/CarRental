<?php

namespace App\Service;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;

class ReservationService
{

    private ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }


    /**
     * Checking if there is another booking at this time
     * @param string $date_from
     * @param string $date_to
     * @param int $model_id
     * @return bool
     */
    public static function checkDatesAreAvailable(string $date_from, string $date_to, int $model_id): bool
    {
        $reservation = Reservation::whereRaw(
            "(date_from >= ? AND date_to <= ?)",
            [
                $date_from . " 00:00:00",
                $date_to . " 23:59:59"
            ]
        )->where('model_id', $model_id)->first();
        return is_null($reservation);
    }

    /**
     * Store a newly created reservation in database.
     * @param ReservationRequest $request
     * @param int $car_id
     * @return Reservation
     */
    public function store(ReservationRequest $request, int $car_id): Reservation
    {
        $client = $this->clientService->store($request);

        $reservation = new Reservation($request->all());
        $reservation->model_id = $car_id;
        $reservation->client_id = $client->id;
        $reservation->save();
        return $reservation;
    }
}
