<!-- HERO -->
<section>
    <div id="hero" class="hero-section d-flex align-items-center justify-content-center" style="background: url('<?= base_url('assets') . '/img/hero-img.jpg'; ?>') center center/cover no-repeat;">
        <div class="hero-text">
            <h1 class="display-4">Kongfield</h1>
            <p class="lead">Penyewaan lapangan terbaik se-Indonesia</p>
            <a href="<?= base_url('lapangan/create/') ?>" type="button" class="btn btn-primary">Tambah Lapangan Baru</a>
        </div>
    </div>
</section>

<!-- SEARCH -->
<section class="my-4">
    <div class="container search-form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="d-flex" action="<?= base_url('lapangan/search'); ?>" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Cari Lapangan ..." aria-label="Search" name="query">
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
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('lapangan/edit/' . $field['id']) ?>" class="btn btn-info me-2"><span>Edit</span></a>
                            <a href="<?= base_url('lapangan/delete/' . $field['id']) ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<!-- FIELD DETAIL MDOAL -->
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
                <button type="button" class="btn btn-primary" onclick="submitBookingForm();" data-bs-toggle="modal" data-bs-target="#paymentModal">Confirm Booking</button>
            </div>
        </div>
    </div>
</div>

<!-- PAYMENT MODAL -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="paymentModalLabel">Payment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Payment Form -->
                <form id="paymentForm">
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="customerName" required>
                    </div>
                    <div class="mb-3">
                        <label for="customerContact" class="form-label">Contact:</label>
                        <input type="text" class="form-control" id="customerContact" required>
                    </div>
                    <div class="mb-3">
                        <label for="pricePerHour" class="form-label">Price per Hour:</label>
                        <input type="text" class="form-control" id="pricePerHour" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="totalAmount" class="form-label">Total Amount:</label>
                        <input type="text" class="form-control" id="totalAmount" readonly>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Make Payment</button>
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

    function loadFieldDetails(fieldId) {
        $.ajax({
            url: '<?= base_url('lapangan/get_field_details'); ?>',
            type: 'POST',
            data: {
                id: fieldId
            },
            dataType: 'json',
            success: function(response) {
                if (response) {
                    $('#fieldDetailModal #fieldAddress').text(response.address);
                    $('#fieldDetailModal #fieldPricing').text(response.pricing + '/hour');
                    $('#fieldDetailModal .modal-title').text(response.name);
                    $('#fieldDetailModal img').attr('src', response.img_url);
                    $('#fieldDetailModal img').attr('alt', response.name);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error);
                console.error("Status: " + status);
                console.error("Response: " + xhr.responseText);
            }
        });
        console.log('Requesting:', fieldId);
    }
</script>