<link rel="stylesheet" href="<?= base_url('catalog.css') ?>">

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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookDetailsModal" data-title="<?= esc($book['book_title']); ?>" data-author="<?= esc($book['author']); ?>" data-details="<?= esc($book['details']); ?>" data-availability="<?= esc($book['availability']); ?>">
                            More Details
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No books found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal for Book Details -->
<div class="modal fade" id="bookDetailsModal" tabindex="-1" role="dialog" aria-labelledby="bookDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"> <!-- Added modal-dialog-centered class -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookDetailsModalLabel">Book Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="modal-book-title"></h5>
                <h6 id="modal-book-author" class="text-muted"></h6>
                <p id="modal-book-details"></p>
                <p id="modal-book-availability"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
