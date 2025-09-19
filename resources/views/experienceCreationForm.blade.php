@extends('layout')

@section('title')
    Experience creation Form
@endsection

@section('contentPage')

    <div class="container">
        @if($errors->any()) {{-- Ako postoji ikakva greska --}}
        <p class="text-danger">Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
        @endif
        <form action="{{ route('createExperience') }}" method="post" class="m-3">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h3 class="text-secondary text-center">Obrazac za unos iskustva i automobila</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <label class="badge bg-secondary" for="driver">Odaberite vozača</label>
                    <select name="driver_id" id="driver" class="form-control" required>
                        <option value="">--  Biranje vozača  --</option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
                    </select>
                    <label class="badge bg-secondary" for="car">Odaberite automobil</label>
                    <select name="car_id" id="car" class="form-control" required>
                        <option value="">--  Biranje automobila  --</option>
                    @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->brand }} - {{ $car->model }} {{ $car->year_production }} god.</option>
                        @endforeach
                    </select>
                    <label class="badge bg-secondary" for="grade">Unesite ocenu 1-5 (Obavezan unos)</label>
                    <input type="number" name="grade" min="1" max="5" id="grade" class="form-control" required>
                    <label class="badge bg-secondary" for="comment">Unesite komentar (Nije obavezan unos)</label>
                    <textarea name="comment" id="comment" cols="30" rows="4" class="form-control"></textarea>
                    <label class="badge bg-secondary" for="date">Unesite datum</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                    <button type="submit" class="form-control btn-secondary mt-4">Pošalji podatke</button>
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

