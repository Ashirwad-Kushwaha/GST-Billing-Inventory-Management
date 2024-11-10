<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bill</title>
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

<body>
  <nav class="navbar navbar-custom navbar-expand-lg">
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
        <h2>Select an Application to Create Bill</h2>

        <div class="list-group mt-3">
            @foreach ($applications as $application)
                <a href="{{ url('/applications/' . $application->id . '/bills/create') }}" class="list-group-item list-group-item-action">
    {{ $application->title }}
</a>

            @endforeach
        </div>
    </div>
</body>

</html>
