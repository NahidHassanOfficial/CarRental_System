<x-admin-dash.layouts.layout>


    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <h2 class="page-title">Dashboard</h2>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-primary text-light">
                                            <div class="stat-panel text-center">
                                                <div class="stat-panel-number h1 ">{{ $availableCarCount }}</div>
                                                <div class="stat-panel-title text-uppercase"> Number of available cars
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="block-anchor panel-footer">Full Detail <i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-success text-light">
                                            <div class="stat-panel text-center">
                                                <div class="stat-panel-number h1 ">{{ $carCount }}</div>
                                                <div class="stat-panel-title text-uppercase"> Total number of cars
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-info text-light">
                                            <div class="stat-panel text-center">

                                                <div class="stat-panel-number h1 ">{{ $rentalCount }}</div>
                                                <div class="stat-panel-title text-uppercase">Total number of rentals
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-info text-light">
                                            <div class="stat-panel text-center">

                                                <div class="stat-panel-number h1 ">{{ $totalEarning }}</div>
                                                <div class="stat-panel-title text-uppercase"> Total earnings from
                                                    rentals
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-dash.layouts.layout>
