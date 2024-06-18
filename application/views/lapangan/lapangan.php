<!-- HERO -->
<section>
  <div id="hero" class="hero-section d-flex align-items-center justify-content-center">
    <div class="hero-text">
      <h1 class="display-4">Kongfield</h1>
      <p class="lead">Penyewaan lapangan terbaik se-Indonesia</p>
    </div>
  </div>
</section>

<!-- SEARCH -->
<section class="my-4">
  <div id="fields" class="container search-form">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Cari Lapangan ..." aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- GRID -->
<div class="container card-grid">
  <div class="row">
    <?php foreach ($fields as $field) : ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="<?= base_url() . $field['img_url']; ?>" class="card-img-top uniform-img" alt="<?= $field['name']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $field['name']; ?></h5>
            <p class="card-text"><?= $field['description']; ?></p>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fieldDetailModal" onclick="loadFieldDetails(<?= $field['id']; ?>);">View Details</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- DETAIL MDOAL -->
<div class="modal fade" id="fieldDetailModal" tabindex="-1" aria-labelledby="fieldDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="fieldDetailModalLabel">Field Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="https://picsum.photos/400/300" class="card-img-top mb-3 img-fluid" alt="Field Image">
        <p class="lead">Address: <span id="fieldAddress"></span></p>
        <p class="lead">Pricing: <span id="fieldPricing"></span></p>
        <!-- Booking Form -->
        <form>
          <div class="mb-3">
            <label for="bookingDate" class="form-label">Date:</label>
            <input type="date" class="form-control" id="bookingDate" required>
          </div>
          <div class="mb-3 row">
            <div class="col">
              <label for="startTime" class="form-label">Start Time:</label>
              <input type="time" class="form-control" id="startTime" required>
            </div>
            <div class="col">
              <label for="endTime" class="form-label">End Time:</label>
              <input type="time" class="form-control" id="endTime" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="customerName" class="form-label">Name:</label>
            <input type="text" class="form-control" id="customerName" required>
          </div>
          <div class="mb-3">
            <label for="customerContact" class="form-label">Contact:</label>
            <input type="text" class="form-control" id="customerContact" required>
          </div>
          <div class="mb-3">
            <label for="totalAmount" class="form-label">Total Amount:</label>
            <label for="totalAmount" class="form-label" id="totalAmount">Rp. 0</label>
          </div>
          <div class="mb-3">
            <label for="paymentMethod" class="form-label">Payment Method:</label>
            <select class="form-control" id="paymentMethod">
              <option value="1">BCA - 7123321</option>
              <option value="2">Mandiri - 1233212</option>
              <option value="3">Gopay / OVO / Dana - 0812312312</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="showReceipt();" data-bs-toggle="modal" data-bs-target="#paymentModal">Confirm Booking</button>
      </div>
    </div>
  </div>
</div>

<script>
  function loadFieldDetails(fieldId) {
    $.ajax({
      url: '<?= base_url('lapangan/get_field_details'); ?>', // Adjust this URL based on your actual route
      type: 'POST',
      data: {
        id: fieldId
      },
      dataType: 'json',
      success: function(response) {
        if (response) {
          $('#fieldDetailModal #fieldAddress').text(response.address);
          $('#fieldDetailModal #fieldPricing').text('IDR. ' + response.pricing + ' / hour');
          $('#fieldDetailModal .modal-title').text(response.name);
          $('#fieldDetailModal img').attr('src', response.img_url);
          $('#fieldDetailModal img').attr('alt', response.name);
        }
      },
      error: function() {
        alert('Unable to fetch data. Please try again.');
      }
    });
  }

  function calculateTotal() {
    const startTime = document.getElementById('startTime').value;
    const endTime = document.getElementById('endTime').value;
    const bookingDate = document.getElementById('bookingDate').value;

    if (startTime && endTime && bookingDate) {
      const start = new Date(bookingDate + 'T' + startTime);
      const end = new Date(bookingDate + 'T' + endTime);

      // Ensure end time is after start time
      if (end > start) {
        const duration = (end - start) / (1000 * 60 * 60); // Convert milliseconds to hours
        let pricePerHour = document.getElementById('fieldPricing').textContent.replace(/[^0-9.-]+/g, '');
        let matches = pricePerHour.match(/\d+/);
        let price = matches ? parseInt(matches[0], 10) : 0;
        const totalAmount = duration * price;

        document.getElementById('totalAmount').textContent = formatCurrency(totalAmount);
      } else {
        alert("End time must be after start time.");
        document.getElementById('endTime').value = ''; // Reset end time
        document.getElementById('totalAmount').value = ''; // Reset total amount
      }
    }
  }

  function formatCurrency(number) {
    return 'Rp ' + number; // Format as currency
  }

  // Add event listeners to update total when dates or times change
  document.getElementById('startTime').addEventListener('change', calculateTotal);
  document.getElementById('endTime').addEventListener('change', calculateTotal);
  document.getElementById('bookingDate').addEventListener('change', calculateTotal);

  function showReceipt() {
    const bookingDate = document.getElementById('bookingDate').value;
    const startTime = document.getElementById('startTime').value;
    const endTime = document.getElementById('endTime').value;
    const customerName = document.getElementById('customerName').value;
    const customerContact = document.getElementById('customerContact').value;
    const paymentMethodText = document.getElementById('paymentMethod').options[document.getElementById('paymentMethod').selectedIndex].text;
    let pricePerHour = document.getElementById('fieldPricing').textContent.replace(/[^0-9.-]+/g, '');
    const start = new Date(bookingDate + 'T' + startTime);
    const end = new Date(bookingDate + 'T' + endTime);

    if (bookingDate && startTime && endTime && customerName && customerContact) {
      const duration = (end - start) / (1000 * 60 * 60); // Convert milliseconds to hours
      let pricePerHour = document.getElementById('fieldPricing').textContent.replace(/[^0-9.-]+/g, '');
      let matches = pricePerHour.match(/\d+/);
      let price = matches ? parseInt(matches[0], 10) : 0;
      const totalAmount = duration * price;


      // Compile the receipt message
      const receiptMessage = `
        Receipt Summary:
        Name: ${customerName}
        Contact: ${customerContact}
        Date: ${bookingDate}
        Time: ${startTime} to ${endTime}
        Duration: ${duration} Hours
        Price per Hour: Rp. ${price}
        Total Amount: Rp. ${totalAmount}
        Payment Method: ${paymentMethodText}
        `;

      // Show receipt message in an alert
      alert(receiptMessage);

    } else {
      alert("Please make sure all fields are filled correctly.");
    }
  }
</script>