<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
                .navbar-custom {
            background-color: #007bff;
            padding: 1rem 2rem;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
        }

        .navbar-custom .nav-link:hover {
            color: #ddd;
        }
    </style>
</head>

<body><nav class="navbar navbar-custom navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Bill Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
            <a class="nav-link" href="/">Home</a> <!-- Home Link -->
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
                        <a class="nav-link" href="{{ route('sales') }}">Sales</a> <!-- Sales Link -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Sales Overview</h2>

        <!-- Table for Total Sale in a Day -->
        <div class="mb-4">
            <h3>Total Sales in a Day</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Total Sale (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dailySales as $sale)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($sale->date)->format('d-m-Y') }}</td>
                            <td>₹ {{ number_format($sale->total_sale, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Table for Total Sale in a Month -->
        <div class="mb-4">
            <h3>Total Sales in a Month</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Total Sale (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthlySales as $sale)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($sale->month)->format('F Y') }}</td>
                            <td>₹ {{ number_format($sale->total_sale, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Table for Application with Most Sales -->
        <div>
            <h3>Application with Most Sales</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Application Name</th>
                        <th>Total Sale (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $topApplication->name }}</td>
                        <td>₹ {{ number_format($topApplication->total_sale, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
