@extends('layout')

@section('title')
    Data Driver Change
@endsection

@section('contentPage')
    <div class="container">
        @if($errors->any())
        <p class="text-danger">Greska: {{ $errors->first() }}</p>
        @endif
        <form action="{{ route('editDriver', ['driver' => $driver->id]) }}" method="post" class="m-3">
            @csrf
            @method('PUT')
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <h3 class="text-secondary">Obrazac za promenu podataka vozača</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <label class="badge bg-secondary" for="name">Promenit ime i prezime (Obavezan unos)</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $driver->name }}" required>
                    <label class="badge bg-secondary" for="email">Promenite email (Obavezan unos)</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $driver->email }}" required>
                </div>
                <div class="col-4">
                    <label class="badge bg-secondary" for="years-experience">Promenite godine iskustva</label>
                    <input type="number" name="years_experience" id="years-experience" class="form-control" value="{{ $driver->years_experience }}">
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
