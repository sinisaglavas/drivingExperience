@extends('layout')

@section('title')
    Car Driver All Experiences
@endsection

@section('contentPage')
    <div class="container">
        @if($errors->any()) {{-- Ako postoji ikakva greska --}}
        <p class="text-danger">Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
        @endif

            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h3 class="text-secondary text-center mt-3 mb-4">Odaberi sva iskustva po vozaču ili automobilu</h3>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-6 border-end">
                    <form action="{{ route('driverExperiences') }}" method="post" class="m-3">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <label class="badge bg-secondary" for="driver">Odaberite vozača</label>
                                <select name="driver_id" id="driver" class="form-control">
                                    <option value="">--  Biranje vozača  --</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="form-control btn-secondary mt-4">Pronađi iskustva</button>
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

                    @if(session('driverExperiences'))
                        @foreach(session('driverExperiences') as $experience)
                            <div class="card border-success mb-3">
                                <div class="card-header bg-transparent border-success d-flex justify-content-between">
                                    <div>{{ $experience->driver->name }}</div>
                                    <div><span class="btn btn-success btn-sm">{{ \Carbon\Carbon::parse($experience->date)->format('d.m.Y.') }}</span></div>
                                </div>
                                <div class="card-body text-secondary">
                                    <h5 class="card-title">{{ $experience->car->brand }} - {{ $experience->car->model }}
                                        {{ $experience->car->year_production }}
                                    </h5>
                                    <p class="card-text">{{ $experience->comment }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-success"><mark class="fw-bold fs-5">Ocena: {{ $experience->grade }}</mark></div>
                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="col-6 border-start">
                    <form action="{{ route('carExperiences') }}" method="post" class="m-3">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <label class="badge bg-secondary" for="car">Odaberite automobil</label>
                                <select name="car_id" id="car" class="form-control">
                                    <option value="">--  Biranje automobila  --</option>
                                    @foreach($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->brand }} - {{ $car->model }} {{ $car->year_production }} god.</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="form-control btn-secondary mt-4">Pronađi iskustva</button>
                            </div>
                        </div>
                    </form>

                    <div class="row d-flex justify-content-center">
                        <div class="col-8">
                            @if(session()->has('message1'))
                                <div class="alert alert-success text-center fw-bold fs-6">
                                    {{ session()->get('message1') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    @if(session('carExperiences'))
                        @foreach(session('carExperiences') as $experience)
                            <div class="card border-success mb-3">
                                <div class="card-header bg-transparent border-success d-flex justify-content-between">
                                    <div>{{ $experience->driver->name }}</div>
                                    <div><span class="btn btn-success btn-sm">{{ \Carbon\Carbon::parse($experience->date)->format('d.m.Y.') }}</span></div>
                                </div>
                                <div class="card-body text-secondary">
                                    <h5 class="card-title">{{ $experience->car->brand }} - {{ $experience->car->model }}
                                        {{ $experience->car->year_production }}
                                    </h5>
                                    <p class="card-text">{{ $experience->comment }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-success"><mark class="fw-bold fs-5">Ocena: {{ $experience->grade }}</mark></div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
    </div>

@endsection




