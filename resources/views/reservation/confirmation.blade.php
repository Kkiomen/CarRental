@extends('layouts.basic')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8">
                <h1 class="text-success">The reservation has been confirmed</h1>
                <hr/>
                <p><strong>Booking from:</strong> {{ $reservation->date_from }}</p>
                <p><strong>Booking to:</strong> {{ $reservation->date_to }}</p>
                <hr/>
                <p>Booked by -  {{ $reservation->client->firstname }} {{ $reservation->client->secondname }} ({{ $reservation->client->email }})</p>
            </div>
            <div class="col-lg-6 col-md-8 mx-auto">
                <img src="{{ $reservation->car->imageUrl }}" width="40%">
                <h1 class="fw-light">{{ $reservation->car->brand->name }} <small>{{ $reservation->car->name }}</small></h1>
                <p class="lead text-muted">Rent the car of your dreams in few minutes</p>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                            <tr>
                                <th>Brand</th>
                                <td>{{ $reservation->car->brand->name }}</td>
                            </tr>
                            <tr>
                                <th>Model</th>
                                <td>{{ $reservation->car->name }}</td>
                            </tr>
                            <tr>
                                <th>Year of production</th>
                                <td>{{ $reservation->car->yearOfProduction }}</td>
                            </tr>
                            <tr>
                                <th>Engine Power</th>
                                <td>{{ $reservation->car->enginePower }} KM</td>
                            </tr>
                            <tr>
                                <th>Engine Capacity</th>
                                <td>{{ $reservation->car->engineCapacity }} cm<sup>3</sup></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
