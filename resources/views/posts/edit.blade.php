<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title> <a href="{{ url()->previous() }}" class="btn btn-primary">Previous</a>
</head>
<body>

    <h2>Edit Post</h2>

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
    <form method="POST" action="{{ route('update_post', $post->id) }}">
        @csrf
        @method('PUT')  <!-- This is necessary to spoof the PUT method -->

        <label>User</label> :
        <select name="user_id">
            @foreach ($users as $user)
                <!-- Check if the current user's id matches the post's user_id and set it as selected -->
                <option value="{{ $user['id'] }}"
                    @if($user['id'] == $post->user_id) selected @endif>
                    {{ $user['name'] }}
                </option>
            @endforeach
        </select><br><br>

        <label>Title</label> :
        <input type="text" name="title" value="{{ old('name', $post->title) }}"><br><br>

        <label>Description</label> :
        <input type="text" name="description" value="{{ old('name', $post->description) }}"><br><br>

        <input type="submit" value="Update">
    </form>

</body>
</html>
