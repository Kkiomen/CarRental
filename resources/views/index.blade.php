@extends('layouts.basic')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Car rental</h1>
                <p class="lead text-muted">Rent the car of your dreams in few minutes</p>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($cars as $car)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ $car->imageUrl }}" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"/>

                        <div class="card-body">
                            <h1>{{ $car->brand->name }}</h1>
                            <h4>{{ $car->name }}</h4>
                            <p class="card-text"></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('reservation_index', ['car_id' => $car->id]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">More information</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
