<!-- Display validation errors if any -->
<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<h2>Add a New Book</h2>

<form action="<?= base_url('/admin/saveBook') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="book_title">Book Title:</label>
        <input type="text" id="book_title" name="book_title" class="form-control" value="<?= set_value('book_title') ?>" required>
    </div>

    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" class="form-control" value="<?= set_value('author') ?>" required>
    </div>

    <div class="form-group">
        <label for="genre">Genre:</label>
        <select id="genre" name="genre" class="form-control" required>
            <option value="">Select Genre</option>
            <option value="Action" <?= set_select('genre', 'Action') ?>>Action</option>
            <option value="Comedy" <?= set_select('genre', 'Comedy') ?>>Comedy</option>
            <option value="Fantasy" <?= set_select('genre', 'Fantasy') ?>>Fantasy</option>
            <option value="Romance" <?= set_select('genre', 'Romance') ?>>Romance</option>
            <option value="Horror" <?= set_select('genre', 'Horror') ?>>Horror</option>
            <option value="Educational" <?= set_select('genre', 'Educational') ?>>Educational</option>
            <option value="Thriller" <?= set_select('genre', 'Thriller') ?>>Thriller</option>
            <option value="Mystery" <?= set_select('genre', 'Mystery') ?>>Mystery</option>
            <option value="Others" <?= set_select('genre', 'Others') ?>>Others</option>
        </select>
    </div>

    <div class="form-group">
        <label for="details">Details:</label>
        <textarea id="details" name="details" class="form-control" rows="4" required><?= set_value('details') ?></textarea>
    </div>

    <div class="form-group">
        <label for="availability">Availability:</label>
        <select id="availability" name="availability" class="form-control" required>
            <option value="">Select Availability</option>
            <option value="Available" <?= set_select('availability', 'Available') ?>>Available</option>
            <option value="Unavailable" <?= set_select('availability', 'Unavailable') ?>>Unavailable</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Book Image:</label>
        <input type="file" id="image" name="image" class="form-control-file">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Book</button>
        <a href="<?= base_url('admin/Catalog') ?>" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
