<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Laravel 11 CRUD Application Tutorial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body> 


    <div class="d-flex justify-content-between align-items-center p-3 mb-3" style="background-color: #ffc0cb; width: 100%;">
        <div class="container d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Welcome, {{ Auth::user()->name }}!</h5>
            <form action="{{ route('logout') }}" onsubmit="return confirmLogout()" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-dark btn-sm">Logout</button>
            </form>
        </div>
    </div>


    <div class="container">
        <h3 class="mb-4">Simple Laravel 11 CRUD Application Tutorial</h3>

        @yield('content')

        <div class="row justify-content-center text-center mt-5">
            <div class="col-md-12">
                <p>
                    Return to Website: 
                    <a href="https://www.usjr.edu.ph/">
                        <strong>University of San Jose - Recoletos</strong>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmLogout() {
            return confirm('Are you sure you want to logout?');
        }
    </script>

    @stack('scripts')
</body>
</html>
