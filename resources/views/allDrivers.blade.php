@extends('layout')

@section('title')
    All Drivers
@endsection

@section('contentPage')
    <div class="container">
        <a href="/driver-creation-form" class="btn btn-secondary btn-sm m-2">Kreiraj novog vozača</a>
        <h3 class="mt-2 mb-2">Svi vozaci:</h3>
        <table class="table table-bordered">
            <tr class="text-center">
                <th>Ime i prezime</th>
                <th>Email</th>
                <th>Godine iskustva</th>
                <th>Vožena auta</th>
                <th>Promeni</th>
                <th>Obriši</th>
            </tr>
            @foreach($drivers as $driver)
                <tr class="text-center">
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->email }}</td>
                    <td>{{ $driver->years_experience }}</td>
                    <td><a href="{{ route('drivenCars', ['driver' => $driver->id]) }}">
                            <i class="fa-solid fa-car"></i>
                        </a>
                    </td>
                    <td><a href="{{ route('driverEditForm', ['driver' => $driver->id]) }}">
                            <i class="fa-solid fa-wrench"></i>
                        </a>
                    </td>
                    <td><a href="{{ route('deleteDriver', ['driver' => $driver->id]) }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection

