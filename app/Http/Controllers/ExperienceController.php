<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();

        return view('allExperiences', compact('experiences'));
    }

    public function experienceCreationForm()
    {
        $cars = Car::all();
        $drivers = Driver::all();

        return view('experienceCreationForm', compact('cars', 'drivers'));
    }

    public function create(Request $request)
    {
        $request->validate([
            "grade" => "required|integer",
            "comment" => "nullable|string",
            "date" => "required",
        ]);
        Experience::create($request->all()); // ovo je kraci nacin novog unosa u tabelu

        return redirect()->back()->with("message", "The data has been successfully entered into the database");
    }

    public function carDriverExperienceForm()
    {
        $drivers = Driver::all();
        $cars = Car::all();

        return view('carDriverExperienceForm', compact('drivers', 'cars'));
    }

    public function driverExperiences(Request $request)
    {
        if ($request->get('driver_id') == null)
        {
            return redirect()->back()->with("message", "No data entered. Please select the driver in the selector!");
        }
        $experiences = Experience::where('driver_id', $request->get('driver_id'))->get();

        return redirect()->back()->with('driverExperiences', $experiences);
    }

    public function carExperiences(Request $request)
    {
        if ($request->get('car_id') == null)
        {
            return redirect()->back()->with("message1", "No data entered. Please select a car in the selector!");
        }
        $experiences = Experience::where('car_id', $request->get('car_id'))->get();

        return redirect()->back()->with('carExperiences', $experiences);
    }

}
