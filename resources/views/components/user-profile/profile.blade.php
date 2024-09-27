<x-layouts.layout>
    <x-user-profile.sidebar>

        <div class="col-md-10 main-content">
            <h2 class="mt-4">Booking History</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Car Model</th>
                        <th>Booking Date</th>
                        <th>Pickup Time</th>
                        <th>Return Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking['car']->name }}</td>
                            <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>
                                @if ($booking->status == 'Canceled')
                                    Cancelled
                                @elseif ($booking->start_date > now())
                                    Upcoming
                                @elseif ($booking->start_date <= now() && $booking->end_date >= now())
                                    Ongoing
                                @elseif ($booking->end_date < now())
                                    Completed
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($booking->start_date > now() && $booking->status != 'Canceled')
                                    <button class="btn btn-sm btn-danger cancel-btn"
                                        onclick="location.href='{{ route('booking.cancel', $booking->id) }}'">Cancel</button>
                                @else
                                    - -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </x-user-profile.sidebar>

</x-layouts.layout>
