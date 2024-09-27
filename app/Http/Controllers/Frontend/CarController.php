<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function carPage()
    {
        $cars = Car::all();

        return view('components.layouts.cars-page', compact('cars'));
    }

    public function filterCars(Request $request)
    {
        $cars = Car::when($request->input('brand'), function ($query) use ($request) {
            $query->where('brand', $request->input('brand'));
        })
            ->when($request->input('price'), function ($query) use ($request) {
                if ($request->input('price') == 'asc') {
                    $query->orderBy('daily_rent_price', 'asc');
                } elseif ($request->input('price') == 'desc') {
                    $query->orderBy('daily_rent_price', 'desc');
                }
            })
            ->when($request->input('year'), function ($query) use ($request) {
                $query->where('year', $request->input('year'));
            })
            ->when($request->input('car_type'), function ($query) use ($request) {
                $query->where('car_type', $request->input('car_type'));
            })
            ->get();

        return response()->json($cars);
    }
}
