<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\InvoiceController;
use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function bookingCancel($id)
    {
        $rental = Rental::where('user_id', request()->header('id'))->find($id);

        if ($rental) {
            if ($rental->start_date > now()->toDateString()) {
                $rental->status = 'Canceled';
                $rental->save();

                noty()->success('Booking cancelled successfully');
                return redirect()->back();

            } else {
                noty()->error('You cannot cancel booking now');
                return redirect()->back();
            }
        } else {
            noty()->error('Booking not found');
            return redirect()->back();
        }
    }

    // public function bookingConfirm(Request $request)
    // {
    //     $carId = $request->id;
    //     $pickDate = Carbon::parse($request->pickDate);
    //     $dropDate = Carbon::parse($request->dropDate);

    //     $userId = $request->header('id');

    //     // Check if pickDate and dropDate are not past dates
    //     $now = Carbon::now();
    //     if ($pickDate->isPast() || $dropDate->isPast()) {
    //         return response()->json(['error' => 'Pick date and drop date cannot be past dates'], 422);
    //     }

    //     // Check if dropDate is the same date as pickDate or a future date
    //     if ($dropDate->lt($pickDate)) {
    //         return response()->json(['error' => 'Drop date must be the same date as pick date or a future date'], 422);
    //     }

    //     $rental = new Rental();
    //     $rental->user_id = $userId;
    //     $rental->car_id = $carId;
    //     $rental->start_date = $pickDate;
    //     $rental->end_date = $dropDate;

    //     $perDayRent = Car::where('id', $carId)->value('daily_rent_price');

    //     $rental->total_cost = (abs($dropDate->diffInDays($pickDate)) + 1) * $perDayRent;

    //     $rental->save();

    //     return response()->json(['message' => 'Booking confirmed successfully'], 200);
    // }

//     public function bookingConfirm(Request $request)
//     {
//         $carId = $request->id;
//         $pickDate = Carbon::parse($request->pickDate);
//         $dropDate = Carbon::parse($request->dropDate);

//         $userId = $request->header('id');

//         // Check if pickDate and dropDate are not past dates
//         $now = Carbon::now();
//         if ($pickDate->isPast() || $dropDate->isPast()) {
//             noty()->error('Pick date and drop date cannot be past dates');
//             return redirect()->back();
//         }

//         // Check if dropDate is the same date as pickDate or a future date
//         if ($dropDate->lt($pickDate)) {
//             noty()->error('Drop date must be the same date as pick date or a future date');
//             return redirect()->back();
//         }

//         // $start_date = $pickDate->toDateString();
//         // $end_date = $dropDate->toDateString();

//         // Check if the car is already booked for the date range
//         $existingRental = Rental::where('car_id', $carId)
//             ->whereNot('status', 'Canceled') // Exclude rentals with status 'Canceled'
//             ->where(function ($query) use ($pickDate, $dropDate) {
//                 $query->where(function ($query) use ($pickDate, $dropDate) {
//                     $query->whereBetween('start_date', [$pickDate, $dropDate]) // Existing rental starts within the range
//                         ->orWhereBetween('end_date', [$pickDate, $dropDate]) // Existing rental ends within the range
//                         ->orWhere(function ($query) use ($pickDate, $dropDate) {
//                             // Overlapping rentals that encompass the entire requested range
//                             $query->where('start_date', '<=', $pickDate)
//                                 ->where('end_date', '>=', $dropDate);
//                         });
//                 });
//             })
//             ->exists();

//         if ($existingRental) {
//             noty()->error('Car is already booked for the selected date range');
//             return redirect()->back();
//         }

//         $rental = new Rental();
//         $rental->user_id = $userId;
//         $rental->car_id = $carId;
//         $rental->start_date = $pickDate;
//         $rental->end_date = $dropDate;

//         $perDayRent = Car::where('id', $carId)->value('daily_rent_price');

//         $rental->total_cost = (abs($dropDate->diffInDays($pickDate)) + 1) * $perDayRent;

//         $rental->save();
//         $rentalId = $rental->id;
//         noty()->success('Booking confirmed successfully');

//         $invoiceController = new InvoiceController();
//         return $invoiceController->sendMail($rentalId);
//         // return redirect()->route('profile');
//     }
//

    public function bookingConfirm(Request $request)
    {

        $carId = $request->id;

        $Notavailable = Car::where('id', $carId)->where('availability', 0)->first();

        if ($Notavailable) {
            noty()->error('Car is not available');
            return redirect()->back();
        }

        $pickDate = Carbon::parse($request->pickDate)->toDateString();
        $dropDate = Carbon::parse($request->dropDate)->toDateString();

        $userId = $request->header('id');

        // Check if pickDate and dropDate are not past dates
        $now = Carbon::now()->toDateString();
        if ($pickDate < $now || $dropDate < $now) {
            noty()->error('Pick date and drop date cannot be past dates');
            return redirect()->back();
        }

        // Check if dropDate is the same date as pickDate or a future date
        if ($dropDate < $pickDate) {
            noty()->error('Drop date must be the same date as pick date or a future date');
            return redirect()->back();
        }

        // Check if the car is already booked for the date range
        $existingRental = Rental::where('car_id', $carId)
            ->where('status', null)
            ->where('start_date', '<=', $dropDate)
            ->where('end_date', '>=', $pickDate)
            ->exists();
        if ($existingRental) {
            noty()->error('Car is already booked for the selected date range');
            return redirect()->back();
        }

        $rental = new Rental();
        $rental->user_id = $userId;
        $rental->car_id = $carId;
        $rental->start_date = $pickDate; // Store the date as string
        $rental->end_date = $dropDate; // Store the date as string

        $perDayRent = Car::where('id', $carId)->value('daily_rent_price');
        $rental->total_cost = (abs(Carbon::parse($dropDate)->diffInDays(Carbon::parse($pickDate))) + 1) * $perDayRent;

        $rental->save();
        $rentalId = $rental->id;
        noty()->success('Booking confirmed successfully');

        $invoiceController = new InvoiceController();
        return $invoiceController->sendMail($rentalId);
        // return redirect()->route('profile');
    }
}
