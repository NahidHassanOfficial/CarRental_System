<x-layouts.layout>
    <x-user-profile.sidebar>
        <!-- Profile Settings Page Component -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Profile Settings</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('update.userInfo') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ $user->name }}" autocomplete="name" autofocus>

                                        <span class="invalid-feedback" role="alert">
                                            <strong>Error message</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ $user->email }}" autocomplete="email">

                                        <span class="invalid-feedback" role="alert">
                                            <strong>Error message</strong>
                                        </span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">New
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-user-profile.sidebar>

</x-layouts.layout>
