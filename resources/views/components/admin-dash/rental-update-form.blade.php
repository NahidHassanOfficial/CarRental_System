<x-admin-dash.layouts.layout>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Edit Rental</h2>

                    <!-- Edit Rental Form -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Rental Details</div>
                        <div class="panel-body">
                            <form action="{{ route('rental.update', $rental->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="rent_start">Rent Start</label>
                                    <input type="date" class="form-control" id="rent_start" name="rent_start"
                                        value="{{ $rental->start_date }}">
                                </div>

                                <div class="form-group">
                                    <label for="rent_end">Rent End</label>
                                    <input type="date" class="form-control" id="rent_end" name="rent_end"
                                        value="{{ $rental->end_date }}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="" {{ $rental->status == null ? 'selected' : '' }}>
                                            Ongoing</option>
                                        <option value="Canceled" {{ $rental->status == 'Canceled' ? 'selected' : '' }}>
                                            Canceled</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Rental</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-admin-dash.layouts.layout>
