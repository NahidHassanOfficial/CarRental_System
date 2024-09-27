<x-admin-dash.layouts.layout>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Manage Vehicles</h2>

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Vehicle Details</div>
                        <div class="panel-body">
                            <table id="zctb" class="display table table-striped table-bordered table-hover"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Car Name</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Availability</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($cars as $car)
                                        <tr>
                                            <td><img src="{{ asset($car->image) }}" width="50" height="50"></td>
                                            <td>{{ $car->name }}</td>
                                            <td>{{ $car->brand }}</td>
                                            <td>{{ $car->model }}</td>
                                            <td>{{ $car->year }}</td>
                                            <td>{{ $car->car_type }}</td>
                                            <td>{{ $car->daily_rent_price }}</td>
                                            <td>
                                                @if ($car->availability)
                                                    Available
                                                @else
                                                    Unavailable
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('car.updatePage', $car->id) }}"><i
                                                        class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('car.delete', $car->id) }}"
                                                    onclick="return confirm('Do you want to delete');"><i
                                                        class="fa fa-close"></i></a>
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
