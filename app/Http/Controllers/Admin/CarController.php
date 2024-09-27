<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function deleteCar($id)
    {
        $car = Car::find($id);
        if ($car) {
            $car->delete();
            noty()->success('Car deleted successfully');
        } else {
            noty()->success('Someting went wrong');
        }
        return redirect()->back();
    }

    public function updateCarPage($id)
    {
        $car = Car::findOrFail($id);
        return view('components.admin-dash.vehicle-update-form', compact('car'));
    }
    public function updateCar(Request $request)
    {
        $request->validate([
            'vehicletitle' => 'required|string',
            'vehicleBrand' => 'required|string',
            'vehiclemodel' => 'required|string',
            'modelyear' => 'required|integer',
            'priceperday' => 'required|numeric',
            'type' => 'required|string',
            'seatingcapacity' => 'required|string',
            'img1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $car = Car::find($request->input('id'));

        $dataToUpdate = [
            'name' => $request->input('vehicletitle'),
            'brand' => $request->input('vehicleBrand'),
            'model' => $request->input('vehiclemodel'),
            'year' => $request->input('modelyear'),
            'car_type' => $request->input('type'),
            'daily_rent_price' => $request->input('priceperday'),
            'availability' => $request->input('seatingcapacity'),
        ];

        if ($request->hasFile('img1')) {
            $image = $request->file('img1');
            $imageName = 'img/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $dataToUpdate['image'] = $imageName;
        }

        $car->update($dataToUpdate);

        noty()->success('Vehicle updated successfully!');
        return redirect()->route('dashboard.cars');
    }

    public function createCarPage()
    {
        return view('components.admin-dash.vehicle-form');
    }

    public function createCar(Request $request)
    {
        $request->validate([
            'vehicletitle' => 'required|string',
            'vehicleBrand' => 'required|string',
            'vehiclemodel' => 'required|string',
            'modelyear' => 'required|integer',
            'priceperday' => 'required|numeric',
            'type' => 'required|string',
            'seatingcapacity' => 'required|string',
            'img1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('img1')) {
            $image = $request->file('img1');
            $imageName = 'img/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
        }

        Car::create([
            'name' => $request->input('vehicletitle'),
            'brand' => $request->input('vehicleBrand'),
            'model' => $request->input('vehiclemodel'),
            'year' => $request->input('modelyear'),
            'car_type' => $request->input('type'),
            'daily_rent_price' => $request->input('priceperday'),
            'availability' => $request->input('seatingcapacity'),
            'image' => $imageName,
        ]);

        noty()->success('Vehicle created successfully!');
        return redirect()->route('dashboard.cars');
    }

    public function manageCars()
    {
        $cars = Car::all();
        return view('components.admin-dash.vehicle', compact('cars'));
    }
}
