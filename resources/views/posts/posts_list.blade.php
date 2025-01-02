<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif
    <h3>Posts List &nbsp;&nbsp; <a href="{{ route('create_post') }}"> <button>Add Posts</button></a> &nbsp;&nbsp; <a href="{{ route('users') }}"> <button>Users =></button></a></h3>
    <br>

    <table border="2">
        <thead>
            <th>Sr.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Onwer</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        &nbsp; <a href="{{ route('edit_post', $post->id) }}"><button>Edit</button></a>&nbsp;
                        <a href="{{ route('delete_post', $post->id) }}"><button>Delete</button></a> &nbsp;
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



</body>
</html>
