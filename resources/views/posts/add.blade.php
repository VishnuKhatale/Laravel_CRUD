<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post</title> <a href="{{ url()->previous() }}" class="btn btn-primary">Previous</a>
</head>
<body>
    <h3>Add Post</h3>
       <!-- Display validation errors if any -->
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
    <!-- Add CSRF token for security -->
    <form method="POST" action="{{ route('save_post') }}"">
        @csrf <!-- This is the CSRF token -->

        <label>User</label> :
        <select name="user_id">
            @foreach ($users as $user)
            <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
            @endforeach
        </select><br><br>

        <label>Title</label> :
        <input type="text" name="title" value="{{ old('title') }}"><br><br>

        <label>Description</label> :
        <input type="text" name="description" value="{{ old('description') }}"><br><br>

        <input type="submit" value="Submit">
    </form>


</body>
</html>
