<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Car Rental Portal | Admin Dashboard</title>

    <!-- Font awesome -->
    <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Sandstone Bootstrap CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Datatables -->
    <link href="{{ asset('admin/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap social button library -->
    <link href="{{ asset('admin/css/bootstrap-social.css') }}" rel="stylesheet">
    <!-- Bootstrap select -->
    <link href="{{ asset('admin/css/bootstrap-select.css') }}" rel="stylesheet">
    <!-- Bootstrap file input -->
    <link href="{{ asset('admin/css/fileinput.min.css') }}" rel="stylesheet">
    <!-- Awesome Bootstrap checkbox -->
    <link href="{{ asset('admin/css/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
    <!-- Admin Stye -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- x-admin-dash.layouts.layout wrapper -->
    <div class="brand clearfix">
        <a href="{{ route('dashboard') }}" style="font-size: 25px;">Car Rental Portal | Admin Panel</a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">

            <li class="ts-account">
                <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i
                        class="fa fa-angle-down hidden-side"></i></a>
                <ul>
                    <li><a href="#">Change Password</a></li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="ts-main-content">
        <x-admin-dash.layouts.nav>
        </x-admin-dash.layouts.nav>

        {{ $slot }}
    </div>
</body>
<!-- Loading Scripts -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/js/fileinput.js') }}"></script>
<script src="{{ asset('admin/js/chartData.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>

</html>
