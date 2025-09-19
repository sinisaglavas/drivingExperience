@extends('layout')

@section('title')
    Car creation Form
@endsection

@section('contentPage')

    <div class="container">
        @if($errors->any()) {{-- Ako postoji ikakva greska --}}
        <p class="text-danger">Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
        @endif
        <form action="{{ route('createCar') }}" method="post" class="m-3">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h3 class="text-secondary text-center">Obrazac za unos novog automobila</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <label class="badge bg-secondary" for="brand">Marka automobila (Obavezan unos)</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand') }}" required>
                    <label class="badge bg-secondary" for="model">Model (Obavezan unos)</label>
                    <input type="text" name="model" id="model" class="form-control" value="{{ old('model') }}" required>
                </div>
                <div class="col-4">
                    <label class="badge bg-secondary" for="years-production">Godina proizvodnje (Obavezan unos)</label>
                    <input type="number" name="year_production" id="years-production" class="form-control"
                           value="{{ old('year_production') }}" required>
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

