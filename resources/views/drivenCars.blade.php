@extends('layout')

@section('title')
    Driven Cars
@endsection

@section('contentPage')
    <div class="container">
        <div class="row">
            <div class="col text-center m-4">
                <h4>Svi automobili koje je <mark>{{ $driver->name }}</mark> vozio i ocenjivao:</h4>
            </div>
            @foreach($cars as $car)
                <div class="card border-success mb-3">
                    <div class="card-header bg-transparent border-success">
                        <div><span class="btn btn-success btn-sm">{{ \Carbon\Carbon::parse($car->pivot->date)->format('d.m.Y.') }}</span></div>
                    </div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}
                            {{ $car->year_production }}
                        </h5>
                        <p class="card-text">{{ $car->pivot->comment }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-success"><mark class="fw-bold fs-5">Ocena: {{ $car->pivot->grade }}</mark></div>
                </div>
            @endforeach
        </div>
    </div>

@endsection





