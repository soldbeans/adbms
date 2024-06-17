<?= view('navbar') ?>
<link rel="stylesheet" href="<?= base_url('catalog.css') ?>">

<div id="book-details" class="section">
    <h2>Book Details</h2>
    <?php if (!empty($book)) : ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= esc($book['book_title']); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= esc($book['author']); ?></h6>
                <p class="card-text">Details: <?= esc($book['details']); ?></p>
                <p class="card-text">Availability: <?= esc($book['availability']); ?></p>
                <?php if (!empty($book['image'])) : ?>
                    <div class="book-image">
                        <img src="<?= base_url('uploads/' . $book['image']) ?>" alt="<?= esc($book['book_title']) ?>" class="img-fluid">
                    </div>
                <?php else : ?>
                    <p>No image available</p>
                <?php endif; ?>
                <a href="<?= base_url('/Catalog') ?>" class="btn btn-secondary">Back to Catalog</a>
            </div>
        </div>
    <?php else : ?>
        <p>Book not found.</p>
    <?php endif; ?>
</div>

<!-- Include jQuery and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
