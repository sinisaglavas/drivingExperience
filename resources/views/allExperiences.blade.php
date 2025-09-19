@extends('layout')

@section('title')
    Experiences
@endsection

@section('contentPage')
    <div class="container">
        <a href="{{ route('experienceForm') }}" class="btn btn-secondary btn-sm m-2">Biraj automobil i ostavi iskustvo</a>
        <h3 class="mt-2 mb-2">Sva iskustva:</h3>
        <table class="table table-bordered">
            <tr class="text-center">
                <th>Vozač</th>
                <th>Automobil</th>
                <th>Auto proiz.</th>
                <th>Ocena</th>
                <th>Komentar</th>
                <th>Datum</th>
                <th>Promeni</th>
                <th>Obriši</th>
            </tr>
            @foreach($experiences as $experience)
                <tr class="text-center">
                    <td>{{ $experience->driver->name }}</td>
                    <td>{{ $experience->car->brand }} - {{ $experience->car->model }}</td>
                    <td>{{ $experience->car->year_production }}</td>
                    <td>{{ $experience->grade }}</td>
                    <td>{{ $experience->comment ?? "Vozač nije uneo komentar" }}</td>
                    <td>{{ $experience->date }}</td>
                    <td><a href="">
                            <i class="fa-solid fa-wrench"></i>
                        </a>
                    </td>
                    <td><a href="">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection



