<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style><style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }

        .navbar-custom {
            background-color: #007bff;
            padding: 1rem 2rem;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white !important;
        }

        .main-content {
            padding: 3rem 1rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        }

        .hero {
            background: #007bff;
            color: white;
            padding: 4rem 1rem;
            border-radius: 8px;
        }

        .footer-custom {
            background-color: #f1f1f1;
            padding: 1.5rem;
            font-size: 0.9rem;
            color: #333;
        }

        .footer-custom a {
            color: #007bff;
        }

        .footer-custom a:hover {
            color: #0056b3;
        }

        .icon-box {
            font-size: 2rem;
            color: #007bff;
        }

        .feature-box {
            background: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    
</style>
</head>
<body class="bg-light">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-custom navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Bill & Inventory System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('applications.create') }}">Create Application</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bills.create', ['application' => 1]) }}">Create Bill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bills.index') }}">Bills History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sales') }}">Sales</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main Content Container -->
    <div class="container my-5">
        <!-- Inject child views here -->
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer-custom text-center">
        <p>
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) &mdash; Developed by <a href="https://github.com/Ashirwad-Kushwaha">Ashirwad-Kushwaha</a>
        </p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
