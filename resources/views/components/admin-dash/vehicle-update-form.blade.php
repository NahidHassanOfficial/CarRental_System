<x-admin-dash.layouts.layout>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Update A Vehicle</h2>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Basic Info</div>

                                <div class="panel-body">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data"
                                        action="{{ route('car.update', $car->id) }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $car->id }}">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Vehicle Title<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="vehicletitle" class="form-control"
                                                    value="{{ $car->name }}">
                                            </div>
                                            <label class="col-sm-2 control-label">Select Brand<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="vehicleBrand" class="form-control"
                                                    value="{{ $car->brand }}">
                                            </div>
                                        </div>

                                        <div class="hr-dashed"></div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Price Per Day (in USD)<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="priceperday" class="form-control"
                                                    value="{{ $car->daily_rent_price }}">
                                            </div>
                                            <label class="col-sm-2 control-label">Model<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="vehiclemodel" class="form-control"
                                                    value="{{ $car->model }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Type<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="type" class="form-control"
                                                    value="{{ $car->car_type }}">
                                            </div>
                                            <label class="col-sm-2 control-label">Model Year<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="modelyear" class="form-control"
                                                    value="{{ $car->year }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Availability<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="seatingcapacity" class="form-control">
                                                    <option value="1"
                                                        {{ $car->availability == 1 ? 'selected' : '' }}>Available
                                                    </option>
                                                    <option value="0"
                                                        {{ $car->availability == 0 ? 'selected' : '' }}>Unavailable
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="hr-dashed"></div>

                                        <img src="{{ asset($car->image) }}" alt="old Car Image"
                                            style="height: 200px; width:200px">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <h4><b>Upload Images</b></h4>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                Image 1 <span style="color:red">*</span>
                                                <input type="file" name="img1" id="img1">
                                            </div>
                                        </div>

                                        <div class="hr-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <button class="btn btn-default" type="reset"
                                                    onclick="location.href='{{ URL::previous() }}'">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Save changes</button>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-dash.layouts.layout>
