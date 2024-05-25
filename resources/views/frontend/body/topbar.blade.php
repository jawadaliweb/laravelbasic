<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .custom-navbar {
            background-color: #0073e6;
            padding: 0.2rem 0;
            height: 2rem; /* Adjust the height as needed */
        }

        .navbar-nav .nav-link {
            color: #fff;
            padding: 0.2rem 0.5rem; /* Adjust the padding as needed */
            font-size: 14px; /* Adjust the font size as needed */
        }

        .navbar-nav .nav-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav style="z-index: 100;" class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @if (!Auth::check())
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}">Admin Login</a>
                    </li>
                    @endif

                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    @endif
                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">logout</a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <!-- Your content goes here -->

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
