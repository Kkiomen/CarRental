<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\CarModel;
use App\Models\Reservation;
use App\Service\ReservationService;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{

    private ReservationService $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }


    public function index($car_id)
    {
        $car = CarModel::find($car_id);
        if (!$car) {
            return Redirect::back()->with('danger', 'Such a car does not exist');
        }

        return view('reservation.index', [
            'car' => $car
        ]);
    }

    public function book($car_id)
    {
        $car = CarModel::find($car_id);
        if (!$car) {
            return Redirect::back()->with('danger', 'Such a car does not exist');
        }

        return view('reservation.book', [
            'car' => $car
        ]);
    }

    public function store(StoreReservationRequest $request, $car_id)
    {
        $request->validated();
        $reservation = $this->reservationService->store($request, $car_id);
        return Redirect::route('reservation_book_confirmation', ['reservation' => $reservation]);
    }

    public function confirmation(Reservation $reservation)
    {
        return view('reservation.confirmation', [
            'reservation' => $reservation
        ]);
    }

    public function list()
    {
        $reservations = Reservation::get();
        return view('reservation.list', [
            'reservations' => $reservations
        ]);
    }
}
