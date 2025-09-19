<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('allCars', compact('cars'));
    }

    public function create(Request $request)
    {
        $request->validate([
            "brand" => "required|string",
            "model" => "required|string",
            "year_production" => "required|integer",
        ]);

        Car::create($request->all()); // ovo je kraci nacin novog unosa u tabelu

        return redirect()->back()->with("message", "The data has been successfully entered into the database");
    }

    public function carEditForm(Car $car)
    {
        return view('carEditForm', compact('car'));
    }

    public function edit(Request $request, Car $car)
    {
        $request->validate([
            "brand" => "required|string",
            'model' => "required|string",
            "year_production" => "required|integer",
        ]);
        $car->update([
            "brand" => $request->get("brand"),
            "model" => $request->get("model"),
            "year_production" => $request->get("year_production"),
        ]);

        return redirect()->back()->with("message", "The data has been successfully changed");
    }

    public function delete(Car $car)
    {
        $car->delete();

        return redirect()->back();
    }

}
