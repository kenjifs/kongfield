<!-- HERO -->
<section>
  <div class="hero-section d-flex align-items-center justify-content-center">
    <div class="hero-text">
      <h1 class="display-4">Kongfield</h1>
      <p class="lead">Penyewaan lapangan terbaik se-Indonesia</p>
      <a href="#" class="btn btn-primary btn-lg">Sewa Sekarang!</a>
    </div>
  </div>
</section>

<!-- SEARCH -->
<section class="my-4">
  <div class="container search-form">
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
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="https://picsum.photos/400/300?random=1" class="card-img-top" alt="Field 1">
        <div class="card-body">
          <h5 class="card-title">Field 1</h5>
          <p class="card-text">A beautiful field perfect for soccer matches and tournaments.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fieldDetailModal">
            View Details
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="https://picsum.photos/400/300?random=2" class="card-img-top" alt="Field 2">
        <div class="card-body">
          <h5 class="card-title">Field 2</h5>
          <p class="card-text">Ideal for practice sessions and local sports events.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fieldDetailModal">
            View Details
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="https://picsum.photos/400/300?random=3" class="card-img-top" alt="Field 3">
        <div class="card-body">
          <h5 class="card-title">Field 3</h5>
          <p class="card-text">Perfect for recreational activities and family gatherings.</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fieldDetailModal">
            View Details
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MDOAL -->
<div class="modal fade" id="fieldDetailModal" tabindex="-1" aria-labelledby="fieldDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="fieldDetailModalLabel">Field Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="https://picsum.photos/400/300" class="card-img-top mb-3 img-fluid" alt="Field Image">
        <p class="lead">Address: <span id="fieldAddress">123 Example St, City</span></p>
        <p class="lead">Pricing: <span id="fieldPricing">$100/hour</span></p>
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitBookingForm();">Confirm Booking</button>
      </div>
    </div>
  </div>
</div>
<script>
  function submitBookingForm() {
    var bookingDate = document.getElementById('bookingDate').value;
    var startTime = document.getElementById('startTime').value;
    var endTime = document.getElementById('endTime').value;

    // Log the values or send them to a server
    console.log("Booking Date:", bookingDate);
    console.log("Start Time:", startTime);
    console.log("End Time:", endTime);
  }
</script>