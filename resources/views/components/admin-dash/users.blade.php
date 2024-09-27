<x-admin-dash.layouts.layout>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Registered Users</h2>

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Reg Users</div>
                        <div class="panel-body">
                            <table id="zctb" class="display table table-striped table-bordered table-hover"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th>Email </th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <a href="{{ route('user.editPage', $user->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ route('user.delete', $user->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
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
