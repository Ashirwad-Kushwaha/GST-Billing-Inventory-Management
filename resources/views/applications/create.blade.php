<!DOCTYPE html>
<html>

<head>
  <title>Create Application</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include any additional CSS or JS here -->
  {{-- jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <h2>Create Application</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('applications.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Include CKEditor or any other rich text editor -->
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <script>
    // Initialize CKEditor
    CKEDITOR.replace('description');

    // Form validation
    function validateForm() {
      // Update the textarea with the CKEditor data before submission
      var editorData = CKEDITOR.instances.description.getData();

      if (!editorData.trim()) {
        alert('Description field is required');
        return false; // Prevent form submission
      }
      return true; // Allow form submission
    }
  </script>
</body>

</html>
