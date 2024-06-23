<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> <!-- Link to your custom CSS -->
    <title>Add a New Book</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Add a New Book</h2>
    
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    
    <form action="<?= base_url('/home/saveBook') ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="book_title">Book Title:</label>
            <input type="text" class="form-control" id="book_title" name="book_title" value="<?= set_value('book_title') ?>" required>
            <div class="invalid-feedback">Please provide a book title.</div>
        </div>
        
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" value="<?= set_value('author') ?>" required>
            <div class="invalid-feedback">Please provide an author name.</div>
        </div>
        
        <div class="form-group">
            <label for="details">Details:</label>
            <textarea class="form-control" id="details" name="details" rows="4" required><?= set_value('details') ?></textarea>
            <div class="invalid-feedback">Please provide details about the book.</div>
        </div>
        
        <div class="form-group">
            <label for="availability">Availability:</label>
            <select class="form-control" id="availability" name="availability" required>
                <option value="Available" <?= set_select('availability', 'Available') ?>>Available</option>
                <option value="Unavailable" <?= set_select('availability', 'Unavailable') ?>>Unavailable</option>
            </select>
            <div class="invalid-feedback">Please select the availability status.</div>
        </div>
        
        <div class="form-group">
            <label for="image">Book Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Book</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>
