<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body> -->
  @extends('layouts.admin')
  @section('content')
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">KS-Admin</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('users.create') }}" class="btn btn-dark">Create User</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if(Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Users</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Profile Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if($users->isNotEmpty())
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    @if($user->profile_photo)
                                    <img width="50" src="{{ asset('uploads/profile/' . $user->profile_photo) }}" alt="Profile Photo">
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d,m,Y') }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-dark">Edit</a>
                                    <a href="#" onclick="deleteUser({{ $user->id }})" class="btn btn-danger">Delete</a>
                                    <form id="delete-user-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- </body>
</html> -->

<script>
    function deleteUser(id){
        if(confirm("Are you sure you want to delete this user?")){
            document.getElementById("delete-user-form-" + id).submit();
        }
    }
</script>
@endsection