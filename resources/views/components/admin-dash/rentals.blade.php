<x-admin-dash.layouts.layout>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Rental History</h2>

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Rental Details</div>
                        <div class="panel-body">
                            <table id="zctb" class="display table table-striped table-bordered table-hover"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Rental ID</th>
                                        <th>Customer Name</th>
                                        <th>Car ID</th>
                                        <th>Rent Start</th>
                                        <th>Rent End</th>
                                        <th>Total Cost</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($rentals as $rental)
                                        <tr>
                                            <td>{{ $rental->id }}</td>
                                            <td>{{ $rental->user->name }}</td>
                                            <td>{{ $rental->car_id }}</td>
                                            <td>{{ $rental->start_date }}</td>
                                            <td>{{ $rental->end_date }}</td>
                                            <td>{{ $rental->total_cost }}</td>
                                            <td>{{ $rental->status }}</td>
                                            <td>
                                                <a href="{{ route('rental.updatePage', $rental->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-admin-dash.layouts.layout>
