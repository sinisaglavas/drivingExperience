<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();

        return view('allDrivers', compact('drivers'));
    }

    public function create(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:drivers,email",
            "years_experience" => "required|integer",
        ]);

        Driver::create($request->all()); // ovo je kraci nacin novog unosa u tabelu

        return redirect()->back()->with("message", "The data has been successfully entered into the database");
    }

    public function driverEditForm(Driver $driver)
    {
        return view('driverEditForm', compact('driver'));
    }

    public function edit(Request $request, Driver $driver)
    {
        $request->validate([
            "name" => "required|string",
            'email' => ['required', 'email', Rule::unique('drivers', 'email')->ignore($driver->id),
            ],
            "years_experience" => "required|integer",
        ]);
        $driver->update([
            "name" => $request->get('name'),
            "email" => $request->get('email'),
            "years_experience" => $request->get('years_experience'),
        ]);

        return redirect()->back()->with("message", "The data has been successfully changed");
    }

    public function delete(Driver $driver)
    {
        $driver->delete();

        return redirect()->back();
    }

    public function drivenCars(Driver $driver)
    {
        $cars = $driver->cars; // svi automobili koje je vozio i ocenjivao

        return view('drivenCars', compact('cars', 'driver'));
    }

}

