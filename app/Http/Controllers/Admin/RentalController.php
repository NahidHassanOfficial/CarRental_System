<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\InvoiceController;
use App\Models\Rental;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function manageRentals()
    {
        $rentals = Rental::with(['car', 'user'])->get();
        return view('components.admin-dash.rentals', compact('rentals'));
    }
    public function updateRentalPage($id)
    {
        $rental = Rental::where('id', $id)->first();
        return view('components.admin-dash.rental-update-form', compact('rental'));
    }

    public function updateRental($id)
    {

        $pickDate = Carbon::parse(request()->input('rent_start')
        )->toDateString();
        $dropDate = Carbon::parse(request()->input('rent_end')
        )->toDateString();

        $rental = Rental::find($id);
        $carId = $rental->car_id;

        // Check if the car is already booked for the date range
        $existingRental = Rental::where('car_id', $carId)
            ->where('id', '!=', $rental->id)
            ->where('status', null)
            ->where('start_date', '<=', $dropDate)
            ->where('end_date', '>=', $pickDate)
            ->exists();
        if ($existingRental) {
            noty()->error('Car is already booked for the selected date range');
            return redirect()->back();
        }

        $rental->start_date = request()->input('rent_start');
        $rental->end_date = request()->input('rent_end');
        $rental->status = request()->input('status') == 'Canceled' ? 'Canceled' : null;
        $rental->save();
        $rentalId = $rental->id;
        noty()->success('Successfully Updated');

        if (request()->input('status') == null) {
            $invoiceController = new InvoiceController();
            return $invoiceController->sendMail($rentalId);
        } else {
            return redirect()->route('dashboard.rentals');
        }

    }

}
