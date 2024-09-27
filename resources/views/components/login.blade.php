<x-layouts.layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow animate__animated animate__fadeInDown">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>
                        {{-- <p>Intended URL: {{ session('intended_url') }}</p> --}}
                        <form id="loginForm" method="post" action="{{ url('/login') }}">
                            @csrf
                            <input type="hidden" name="intended_url" value="{{ session('intended_url') }}">

                            <div class="form-group mb-3">
                                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <p class="text-center mt-3">Don't have an account? <a href="/register">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>


{{-- <x-layouts.layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow animate__animated animate__fadeInDown">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>
                        <div id="loginForm">
                            <div class="form-group mb-3">
                                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password"
                                    required>
                            </div>
                            <button onclick="SubmitLogin()" type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                        <p class="text-center mt-3">Don't have an account? <a href="/register">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let email = document.getElementById("email");
        let password = document.getElementById("password");

        function enterKeyListener(e) {
            if (e.key === "Enter") {
                SubmitLogin();
            }
        }

        email.addEventListener("keypress", enterKeyListener);
        password.addEventListener("keypress", enterKeyListener);

        async function SubmitLogin() {
            try {
                let email = document.getElementById('email').value;
                let password = document.getElementById('password').value;

                if (email.length === 0) {
                    errorToast("Email is required");
                } else if (password.length === 0) {
                    errorToast("Password is required");
                } else {
                    showLoader();
                    let res = await axios.post('{{ url('/login') }}', {
                        email,
                        password
                    });
                    hideLoader()
                    if (res.data.status === 'success')
                        successToast('Login Successfull');
                    if (res.data.redirect) {
                        redirectUrl = res.data.redirect;
                        setTimeout(function() {
                            window.location.href = redirectUrl;
                        }, 2000);
                    } else {
                        setTimeout(function() {
                            window.location.href = '/profile/history';
                        }, 2000);
                    }
                }
            } catch (error) {
                errorToast(error.response.data.message);
            } finally {
                hideLoader();
            }
        }
    </script>
</x-layouts.layout>  --}}
