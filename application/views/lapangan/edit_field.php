<div class="container mt-5">
    <h2>Edit Field</h2>
    <form method="post" action="<?= base_url('lapangan/update/' . $field['id']) ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $field['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="img_url" class="form-label">Image URL:</label>
            <input type="text" class="form-control" id="img_url" name="img_url" value="<?= $field['img_url'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" required><?= $field['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $field['address'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="pricing" class="form-label">Pricing:</label>
            <input type="text" class="form-control" id="pricing" name="pricing" value="<?= $field['pricing'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Field</button>
    </form>
</div>