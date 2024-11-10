<!DOCTYPE html>
<html>

<head>
  <title>View Bill</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
      border-collapse: collapse;
    }

    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }

    .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.total td:nth-child(4) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }
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

  <div class="invoice-box mt-5">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="4">
          <table>
            <tr>
              <td>
                <h2>Invoice</h2>
                Application: {{ $application->title }}<br>
                Created: {{ $bill->created_at->format('d-m-Y') }}
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="heading">
        <td>Description</td>
        <td>Rate (₹)</td>
        <td>Quantity</td>
        <td>Amount (₹)</td>
      </tr>

      @foreach ($bill->billItems as $item)
        <tr class="item">
          <td>{{ $item->description }}</td>
          <td>{{ number_format($item->rate, 2) }}</td>
          <td>{{ $item->quantity }}</td>
          <td>{{ number_format($item->amount, 2) }}</td>
        </tr>
      @endforeach

      <tr class="total">
        <td colspan="3" class="text-end">Subtotal:</td>
        <td>₹ {{ number_format($bill->subtotal, 2) }}</td>
      </tr>
      <tr class="total">
        <td colspan="3" class="text-end">GST (18%):</td>
        <td>₹ {{ number_format($bill->gst, 2) }}</td>
      </tr>
      <tr class="total">
        <td colspan="3" class="text-end">Grand Total:</td>
        <td>₹ {{ number_format($bill->grand_total, 2) }}</td>
      </tr>
    </table>

    <!-- Return Home Button -->
    <div class="text-center mt-4">
      <a href="{{ url('/') }}" class="btn btn-primary">Return Home</a>
    </div>
  </div>
</body>

</html>
