<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-2 sidebar bg-dark">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ route('profile') }}">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('profile.setting') }}">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
        {{ $slot }}
    </div>
</div>
