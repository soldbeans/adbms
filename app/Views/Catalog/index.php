<div id="catalog" class="section">
    <h2>Book Catalog</h2>
    <div class="card-columns">
        <?php if (!empty($books) && is_array($books)) : ?>
            <?php foreach ($books as $book) : ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($book['book_title']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= esc($book['author']); ?></h6>
                        <p class="card-text">Details: <?= esc($book['details']); ?></p>
                        <p class="card-text">Availability: <?= esc($book['availability']); ?></p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No books found.</p>
        <?php endif; ?>
    </div>
</div>
