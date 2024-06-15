    <h2>Add a New Book</h2>
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/home/saveBook') ?>" method="post">
        <div>
            <label for="book_title">Book Title:</label>
            <input type="text" name="book_title" value="<?= set_value('book_title') ?>" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" value="<?= set_value('author') ?>" required>
        </div>
        <div>
            <label for="details">Details:</label>
            <textarea name="details" required><?= set_value('details') ?></textarea>
        </div>
        <div>
            <label for="availability">Availability:</label>
            <select name="availability">
                <option value="Available" <?= set_select('availability', 'Available') ?>>Available</option>
                <option value="Unavailable" <?= set_select('availability', 'Unavailable') ?>>Unavailable</option>
            </select>
        </div>
        <div>
            <button type="submit">Add Book</button>
        </div>
    </form>
    </div>
    <div class="footer">
        <p>Libraryworks.com --- "The library that works"</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
