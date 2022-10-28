<?php

namespace App\Service;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;

class ReservationService
{

    private ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }


    public static function checkDatesAreAvailable($date_from, $date_to, $model_id): bool
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

    public function store(StoreReservationRequest $request, $car_id): Reservation
    {

        $client = $this->clientService->store($request);

        $reservation = new Reservation();
        $reservation->model_id = $car_id;
        $reservation->client_id = $client->id;
        $reservation->date_from = $request->input('date_from');
        $reservation->date_to = $request->input('date_to');
        $reservation->save();
        return $reservation;
    }
}
