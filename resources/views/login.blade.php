<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('css/login.css') }}">
<title>Login</title>
 
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error">
               
                    @foreach ($errors->all() as $error)
                        <p style="margin: 0; padding-left: 20px; text-align: center;">{{ $error }}</p>
                    @endforeach
              
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="user_id">User ID</label>
            <input type="text" name="user_id" id="user_id" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            Don't have an account yet? <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
