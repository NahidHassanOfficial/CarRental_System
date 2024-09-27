<!-- Invoice Page -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Invoice for Car Rental</h2>
                    <p class="card-text">Invoice Details:</p>
                    <table class="table table-bordered">
                        <tr>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td>Car Rental</td>
                            <td>{{ $car->name }} ({{ $car->year }})</td>
                            <td>{{ $pickDate }} - {{ $dropDate }}</td>
                            <td>{{ $car->daily_rent_price }}/day</td>
                            <td>{{ $totalCost }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Tax (0%):</td>
                            <td>$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Total:</td>
                            <td>{{ $totalCost }}</td>
                        </tr>
                    </table>
                    <form method="POST" action="{{ route('booking.confirmed') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $car->id }}">
                        <input type="hidden" name="pickDate" value="{{ $pickDate }}">
                        <input type="hidden" name="dropDate" value="{{ $dropDate }}">
                        <button type="submit" class="btn btn-primary btn-block">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
