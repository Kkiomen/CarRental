@extends('layouts.basic')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{ $car->brand->name }} <small>{{ $car->name }}</small></h1>
                <p class="lead text-muted">Rent the car of your dreams in few minutes</p>
                <a href="{{ route('reservation_book', ['car_id' => $car->id]) }}">
                    <button class="btn btn-dark col-12"><i class="fa-solid fa-bookmark me-3"></i> Book this car</button>
                </a>
            </div>
            <div class="col-lg-6 col-md-8 mx-auto">
                <img src="{{ $car->imageUrl }}" width="40%">
            </div>
        </div>
    </section>
    <div class="py-5 bg-light">
        <div class="container">

            <h3>Information:</h3>

            <div class="mt-3">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover">
                        <tr>
                            <th>Brand</th>
                            <td>{{ $car->brand->name }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $car->name }}</td>
                        </tr>
                        <tr>
                            <th>Year of production</th>
                            <td>{{ $car->yearOfProduction }}</td>
                        </tr>
                        <tr>
                            <th>Engine Power</th>
                            <td>{{ $car->enginePower }} KM</td>
                        </tr>
                        <tr>
                            <th>Engine Capacity</th>
                            <td>{{ $car->engineCapacity }} cm<sup>3</sup></td>
                        </tr>
                        <tr>
                            <th>Number doors</th>
                            <td>{{ $car->numberDoors }}</td>
                        </tr>
                        <tr>
                            <th>Number airbags</th>
                            <td>{{ $car->airbags }}</td>
                        </tr>
                        <tr>
                            <th>Fuel</th>
                            <td>{{ ucfirst($car->fuel) }}</td>
                        </tr>
                        <tr>
                            <th>Gearbox</th>
                            <td>{{ ucfirst($car->gearbox) }}</td>
                        </tr>
                        <tr>
                            <th>ABS</th>
                            <td>{!! $car->abs ? '<i class="fa-solid fa-square-check text-success"></i>' : '<i class="fa-solid fa-square-xmark text-danger"></i>' !!}</td>
                        </tr>
                        <tr>
                            <th>Electric Windows</th>
                            <td>{!! $car->electricWindows ? '<i class="fa-solid fa-square-check text-success"></i>' : '<i class="fa-solid fa-square-xmark text-danger"></i>' !!}</td>
                        </tr>
                        <tr>
                            <th>Electric Mirrors</th>
                            <td>{!! $car->electricMirrors ? '<i class="fa-solid fa-square-check text-success"></i>' : '<i class="fa-solid fa-square-xmark text-danger"></i>' !!}</td>
                        </tr>
                        <tr>
                            <th>Heated Mirrors</th>
                            <td>{!! $car->heatedMirrors ? '<i class="fa-solid fa-square-check text-success"></i>' : '<i class="fa-solid fa-square-xmark text-danger"></i>' !!}</td>
                        </tr>
                        <tr>
                            <th>Central Locking</th>
                            <td>{!! $car->centralLocking ? '<i class="fa-solid fa-square-check text-success"></i>' : '<i class="fa-solid fa-square-xmark text-danger"></i>' !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
