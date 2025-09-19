@extends('layout')

@section('title')
    Driver creation Form
@endsection

@section('contentPage')

    <div class="container">
        @if($errors->any()) {{-- Ako postoji ikakva greska --}}
        <p class="text-danger">Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
        @endif
        <form action="{{ route('createDriver') }}" method="post" class="m-3">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <h3 class="text-secondary">Obrazac za unos novog vozača</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <label class="badge bg-secondary" for="name">Unesite ime i prezime (Obavezan unos)</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    <label class="badge bg-secondary" for="email">Unesite email (Obavezan unos)</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="col-4">
                    <label class="badge bg-secondary" for="years-experience">Unesite godine iskustva ako ih imate</label>
                    <input type="number" name="years_experience" id="years-experience" class="form-control" value="0">
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
