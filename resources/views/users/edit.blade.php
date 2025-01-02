<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title> <a href="{{ url()->previous() }}" class="btn btn-primary">Previous</a>
</head>
<body>

    <h2>Edit User</h2>

    <!-- Display validation errors (if any) -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <br>
    <form method="POST" action="{{ route('update_user', $user->id) }}">
        @csrf
        @method('PUT')  <!-- This is necessary to spoof the PUT method -->

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}"><br><br>

        <label>Email:</label>
        <input type="text" name="email" value="{{ old('email', $user->email) }}"><br><br>

        <input type="submit" value="Update">
    </form>

</body>
</html>
