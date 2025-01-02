<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title> <a href="{{ url()->previous() }}" class="btn btn-primary">Previous</a>
</head>
<body>
    <h3>Add User</h3>
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
    <form method="POST" action="{{ route('save_user') }}">
        @csrf <!-- This is the CSRF token -->

        <label>Name</label> :
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email</label> :
        <input type="text" name="email" value="{{ old('email') }}"><br><br>

        <input type="submit" value="Submit">
    </form>


</body>
</html>
