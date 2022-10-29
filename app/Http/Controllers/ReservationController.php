<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\CarModel;
use App\Models\Reservation;
use App\Service\ReservationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReservationController extends Controller
{

    private ReservationService $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }


    /**
     * Display information about the selected car
     * @param int $car_id
     * @return View|RedirectResponse
     */
    public function index(int $car_id): View|RedirectResponse
    {
        $carModel = CarModel::find($car_id);
        if (!$carModel) {
            return Redirect::back()->with('danger', 'Such a car does not exist');
        }

        return view('reservation.index', [
            'car' => $carModel
        ]);
    }

    /**
     * Display a form with the possibility of booking the selected car
     * @param int $car_id
     * @return View|RedirectResponse
     */
    public function book(int $car_id): View|RedirectResponse
    {
        $carModel = CarModel::find($car_id);
        if (!$carModel) {
            return Redirect::back()->with('danger', 'Such a car does not exist');
        }

        return view('reservation.book', [
            'car' => $carModel
        ]);
    }

    /**
     * Store a newly created reservation in database.
     * @param ReservationRequest $request
     * @param int $car_id
     * @return RedirectResponse
     */
    public function store(ReservationRequest $request, int $car_id): RedirectResponse
    {
        $reservation = $this->reservationService->store($request, $car_id);
        return Redirect::route('reservation_book_confirmation', ['reservation' => $reservation]);
    }

    /**
     * View booking confirmation
     * @param Reservation $reservation
     * @return View
     */
    public function confirmation(Reservation $reservation): View
    {
        return view('reservation.confirmation', [
            'reservation' => $reservation
        ]);
    }

    /**
     * View booking lists in the administration panel
     * @return View
     */
    public function list(): View
    {
        return view('reservation.list', [
            'reservations' => Reservation::get()
        ]);
    }
}
