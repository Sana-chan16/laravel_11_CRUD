<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="">
        <label for="id">User ID: </label>
        <input type="id" name= "id"><br><br>
        <label for="password">Password: </label>
        <input type="password" name= "password"><br><br>
        <button type ="submit">Login</button>

    </form>

    <p>Dont have account yet? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>