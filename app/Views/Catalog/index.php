<div id="catalog" class="section">
    <h2>Book Catalog</h2>
    <div class="card-columns">
        <?php if (!empty($books) && is_array($books)) : ?>
            <?php foreach ($books as $book) : ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title"><?= esc($book['book_title']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= esc($book['author']); ?></h6>
                                <p class="card-text">Details: <?= esc($book['details']); ?></p>
                                <p class="card-text">Availability: <?= esc($book['availability']); ?></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookDetailsModal" data-id="<?= esc($book['book_id']); ?>" data-title="<?= esc($book['book_title']); ?>" data-author="<?= esc($book['author']); ?>" data-details="<?= esc($book['details']); ?>" data-availability="<?= esc($book['availability']); ?>" data-image="<?= !empty($book['image']) ? 'data:image/jpeg;base64,' . $book['image'] : ''; ?>">
                                    More Details
                                </button>
                                <button type="button" class="btn btn-danger delete-book" data-id="<?= esc($book['book_id']); ?>">
                                    Delete
                                </button>
                            </div>
                            <div class="col-md-4">
                                <div class="book-image-container">
                                    <?php if (!empty($book['image'])) : ?>
                                        <img src="data:image/jpeg;base64,<?= $book['image']; ?>" alt="<?= esc($book['book_title']); ?>" class="img-fluid book-image">
                                    <?php else : ?>
                                        <p>No image available</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No books found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Include your JavaScript file -->
<script src="<?= base_url('js/bookDetails.js'); ?>"></script>

<!-- Modal for Book Details and Update -->
<div class="modal fade" id="bookDetailsModal" tabindex="-1" role="dialog" aria-labelledby="bookDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookDetailsModalLabel">Book Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateBookForm" action="<?= base_url('Home/updateBook') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="book_id" id="modal-book-id">
                <div class="modal-body d-flex">
                    <div class="flex-fill mr-3">
                        <div class="form-group">
                            <label for="modal-book-title">Title</label>
                            <input type="text" class="form-control" id="modal-book-title" name="book_title">
                        </div>
                        <div class="form-group">
                            <label for="modal-book-author">Author</label>
                            <input type="text" class="form-control" id="modal-book-author" name="author">
                        </div>
                        <div class="form-group">
                            <label for="modal-book-details">Details</label>
                            <textarea class="form-control" id="modal-book-details" name="details"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="modal-book-availability">Availability</label>
                            <select class="form-control" id="modal-book-availability" name="availability">
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modal-book-image">Image</label>
                            <input type="file" class="form-control" id="modal-book-image" name="image" accept="image/*">
                        </div>
                    </div>
                    <div class="flex-fill ml-3">
                        <div class="book-image-container">
                            <img id="modal-book-image-preview" src="" alt="Book Image" class="img-fluid book-image">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- External JavaScript file -->
<script src="<?= base_url('bookDetails.js') ?>"></script>
