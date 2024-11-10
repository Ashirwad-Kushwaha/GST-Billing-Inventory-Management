<!DOCTYPE html>
<html>

<head>
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

    .remove-btn {
      cursor: pointer;
      color: red;
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
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('applications.create') }}">Create Application</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bills.create', ['application' => $application->id]) }}">Create Bill</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bills.index') }}">Bills History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sales') }}">Sales</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Create Bill for: {{ $application->title }}</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('bills.store', $application->id) }}" method="POST">
      @csrf
      <table class="table-bordered table" id="bill-items-table">
        <thead>
          <tr>
            <th>Description</th>
            <th>Rate (₹)</th>
            <th>Quantity</th>
            <th>Amount (₹)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <input type="text" name="items[0][description]" class="form-control description" required list="item-list" autocomplete="off">
            </td>
            <td><input type="number" step="0.01" name="items[0][rate]" class="form-control rate" required readonly></td>
            <td><input type="number" name="items[0][quantity]" class="form-control quantity" required min="1" max="1"></td>
            <td><input type="number" step="0.01" name="items[0][amount]" class="form-control amount" readonly></td>
            <td><span class="remove-btn">Remove</span></td>
          </tr>
        </tbody>
      </table>
      <button type="button" class="btn btn-secondary" id="add-item">Add Item</button>
      <hr>
      <div class="row">
        <div class="col-md-6 offset-md-6">
          <table class="table">
            <tr>
              <th>Subtotal:</th>
              <td>₹ <span id="subtotal">0.00</span></td>
            </tr>
            <tr>
              <th>GST (18%):</th>
              <td>₹ <span id="gst">0.00</span></td>
            </tr>
            <tr>
              <th>Grand Total:</th>
              <td>₹ <span id="grand_total">0.00</span></td>
            </tr>
          </table>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Generate Bill</button>
    </form>
  </div>

  <datalist id="item-list">
    @foreach ($inventoryItems as $item)
      <option value="{{ $item->product_name }}" data-rate="{{ $item->product_price }}" data-stock="{{ $item->product_quantity }}">
        {{ $item->name }}
      </option>
    @endforeach
  </datalist>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    let itemIndex = 1;

    // Function to recalculate amounts
    function recalculate() {
      let subtotal = 0;
      $('#bill-items-table tbody tr').each(function() {
        let rate = parseFloat($(this).find('.rate').val()) || 0;
        let quantity = parseInt($(this).find('.quantity').val()) || 0;
        let amount = rate * quantity;
        $(this).find('.amount').val(amount.toFixed(2));
        subtotal += amount;
      });
      let gst = subtotal * 0.18;
      let grand_total = subtotal + gst;

      $('#subtotal').text(subtotal.toFixed(2));
      $('#gst').text(gst.toFixed(2));
      $('#grand_total').text(grand_total.toFixed(2));
    }

    // Add new item row
    $('#add-item').click(function() {
      let newRow = `
        <tr>
          <td>
            <input type="text" name="items[${itemIndex}][description]" class="form-control description" required 
                   list="item-list" autocomplete="off">
          </td>
          <td><input type="number" step="0.01" name="items[${itemIndex}][rate]" class="form-control rate" required readonly></td>
          <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control quantity" required min="1" max="1"></td>
          <td><input type="number" step="0.01" name="items[${itemIndex}][amount]" class="form-control amount" readonly></td>
          <td><span class="remove-btn">Remove</span></td>
        </tr>
      `;
      $('#bill-items-table tbody').append(newRow);
      itemIndex++;
    });

    // Remove item row
    $(document).on('click', '.remove-btn', function() {
      $(this).closest('tr').remove();
      recalculate();
    });

    // Recalculate on input change
    $(document).on('input', '.rate, .quantity', function() {
      recalculate();
    });

    // Populate rate and stock when description is selected
    $(document).on('input', '.description', function() {
      let description = $(this).val();
      let option = $('#item-list option').filter(function() {
        return $(this).val() === description;
      });

      // Get the rate and stock from the matching option
      let rate = option.data('rate');
      let stock = option.data('stock');

      // Set the rate and max quantity if data is available
      if (rate !== undefined && stock !== undefined) {
        $(this).closest('tr').find('.rate').val(rate);
        $(this).closest('tr').find('.quantity').attr('max', stock);
        recalculate();
      }
    });

    // Initial calculation
    recalculate();
  </script>
</body>

</html>
