<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif

    <h3>Users List &nbsp;&nbsp; <a href="{{ route('create_user') }}"> <button>Add User</button></a> &nbsp;&nbsp; <a href="{{ route('posts') }}"> <button>Posts =></button></a></h3>
    <table border="2">
        <thead>
            <th>Sr.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $user['name'] }} </td>
                <td> {{ $user['email'] }} </td>
                <td>
                    &nbsp; <a href="{{ route('edit_user', $user->id) }}"><button>Edit</button></a>
                    &nbsp; <a href="{{ route('delete_user', $user->id) }}"><button>Delete</button></a> &nbsp;
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>




</body>
</html>
