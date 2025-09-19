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

}
