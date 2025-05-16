<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="user_id">User ID: </label>
        <input type="text" name="user_id" id="user_id" required><br><br>
        <label for="user_fname">First Name: </label>
        <input type="text" name="user_fname" id="user_fname" required><br><br>
        <label for="user_lname">Last Name: </label>
        <input type="text" name="user_lname" id="user_lname" required><br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required><br><br>
        <label for="password_confirmation">Confirm Password: </label>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br><br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>