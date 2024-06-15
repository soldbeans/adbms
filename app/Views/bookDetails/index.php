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
                <a href="<?= base_url('/Catalog') ?>" class="btn btn-secondary">Back to Catalog</a>
            </div>
        </div>
    <?php else : ?>
        <p>Book not found.</p>
    <?php endif; ?>
</div>
