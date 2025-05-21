<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Register</title>

  
</head>
<body>
    <div class="register-container">
        <h1>Registration</h1>

        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" required>

            <label for="user_fname">First Name</label>
            <input type="text" name="user_fname" id="user_fname" required>

            <label for="user_lname">Last Name</label>
            <input type="text" name="user_lname" id="user_lname" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            <button type="submit">Register</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>


        @if ($errors->any())
            <div class="message error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</body>
</html>
