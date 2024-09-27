<x-admin-dash.layouts.layout>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Edit User</h2>

                    <!-- Edit Form -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit User</div>
                        <div class="panel-body">
                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>
                                            Customer</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update User</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-admin-dash.layouts.layout>
