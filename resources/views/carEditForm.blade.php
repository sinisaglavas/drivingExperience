@extends('layout')

@section('title')
    Data Car Change
@endsection

@section('contentPage')
    <div class="container">
        @if($errors->any())
            <p class="text-danger">Greska: {{ $errors->first() }}</p>
        @endif
        <form action="{{ route('editCar', ['car' => $car->id]) }}" method="post" class="m-3">
            @csrf
            @method('PUT')
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <h3 class="text-secondary">Obrazac za promenu podataka automobila</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <label class="badge bg-secondary" for="brand">Promenite marku automobila (Obavezan unos)</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{ $car->brand }}" required>
                    <label class="badge bg-secondary" for="model">Promenite model (Obavezan unos)</label>
                    <input type="text" name="model" id="model" class="form-control" value="{{ $car->model }}" required>
                </div>
                <div class="col-4">
                    <label class="badge bg-secondary" for="years-production">Promenite godinu proizvodnje</label>
                    <input type="number" name="year_production" id="years-production" class="form-control" value="{{ $car->year_production }}">
                    <button type="submit" class="form-control btn-secondary mt-4">Promeni podatke</button>
                </div>
            </div>
        </form>
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                @if(session()->has('message'))
                    <div class="alert alert-success text-center fw-bold fs-6">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

