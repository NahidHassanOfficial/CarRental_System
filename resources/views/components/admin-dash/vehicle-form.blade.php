<x-admin-dash.layouts.layout>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Post A Vehicle</h2>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Basic Info</div>

                                <div class="panel-body">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data"
                                        action="{{ route('car.create') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Vehicle Name<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="vehicletitle" class="form-control" required>
                                            </div>
                                            <label class="col-sm-2 control-label">Select Brand<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="vehicleBrand" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="hr-dashed"></div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Price Per Day (in USD)<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="priceperday" class="form-control" required>
                                            </div>
                                            <label class="col-sm-2 control-label">Model<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="vehiclemodel" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Type<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="type" class="form-control" required>
                                            </div>
                                            <label class="col-sm-2 control-label">Model Year<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="modelyear" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Seating Capacity<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="seatingcapacity" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="hr-dashed"></div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <h4><b>Upload Images</b></h4>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                Image 1 <span style="color:red">*</span><input type="file"
                                                    name="img1" required>
                                            </div>
                                        </div>

                                        <div class="hr-dashed"></div>

                                        <div class="form-group">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <button class="btn btn-default" type="reset"
                                                    onclick="location.href='{{ URL::previous() }}'">Cancel</button>
                                                <button class="btn btn-primary" name="submit" type="submit">Save
                                                    changes</button>
                                            </div>
                                        </div>
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
