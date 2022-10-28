@extends('layouts.basic')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Book: {{ $car->brand->name }} <small>{{ $car->name }}</small></div>
                    <div class="card-body">
                        <form action="{{ route('reservation_book_store', ['car_id' => $car->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="model_id" value="{{ $car->id }}">
                            <div class="mb-3">
                                <label>Booking from</label>
                                <input type="date" name="date_from" class="form-control @error('date_from') is-invalid @endif" value="{{ old("date_from") }}">
                            </div>
                            <div class="mb-3">
                                <label>Booking to</label>
                                <input type="date" name="date_to" class="form-control @error('date_to') is-invalid @endif" value="{{ old("date_to") }}">
                            </div>

                            <hr/>
                            <div class="mb-3">
                                <label>Firstname</label>
                                <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @endif" value="{{ old("firstname") }}">
                            </div>
                            <div class="mb-3">
                                <label>Secondname</label>
                                <input type="text" name="secondname" class="form-control @error('secondname') is-invalid @endif" value="{{ old("secondname") }}">
                            </div>
                            <div class="mb-3">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @endif" value="{{ old("email") }}">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-dark">Book now</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 mx-auto">
                <img src="{{ $car->imageUrl }}" width="40%">
                <h1 class="fw-light">{{ $car->brand->name }} <small>{{ $car->name }}</small></h1>
                <p class="lead text-muted">Rent the car of your dreams in few minutes</p>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
