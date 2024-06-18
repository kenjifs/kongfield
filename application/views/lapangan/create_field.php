<div class="container mt-5">
    <h2>Create Field</h2>
    <form method="post" action="<?= base_url('lapangan/store') ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="img_url" class="form-label">Image URL:</label>
            <input type="text" class="form-control" id="img_url" name="img_url" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="pricing" class="form-label">Pricing:</label>
            <input type="text" class="form-control" id="pricing" name="pricing" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Field</button>
    </form>
</div>