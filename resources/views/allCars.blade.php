@extends('layout')

@section('title')
    All Cars
@endsection

@section('contentPage')
    <div class="container">
        <a href="/car-creation-form" class="btn btn-secondary btn-sm m-2">Unesi novi automobil</a>
        <h3 class="mt-2 mb-2">Svi automobili:</h3>
        <table class="table table-bordered">
            <tr class="text-center">
                <th>Marka</th>
                <th>Model</th>
                <th>Godina proizvodnje</th>
                <th>Prosečna ocena</th>
                <th>Promeni</th>
                <th>Obriši</th>
            </tr>
            @foreach($cars as $car)
                <tr class="text-center">
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year_production }}</td>
                    <td>{{ round($car->averageGrade(), 2) }}</td>
                    <td><a href="{{ route('carEditForm', ['car' => $car->id]) }}">
                            <i class="fa-solid fa-wrench"></i>
                        </a>
                    </td>
                    <td><a href="{{ route('deleteCar', ['car' => $car->id]) }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection


