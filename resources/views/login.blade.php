<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

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



    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="user_id">User ID: </label>
        <input type="text" name="user_id" id="user_id" required><br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <p>Don't have an account yet? <a href="{{ route('register') }}">Register</a></p>
</body>
</html>