$(document).ready(function () {
    $('#bookDetailsModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var bookId = button.data('id');
        var title = button.data('title');
        var author = button.data('author');
        var details = button.data('details');
        var availability = button.data('availability');
        var image = button.data('image');

        var modal = $(this);
        modal.find('#modal-book-id').val(bookId);
        modal.find('#modal-book-title').val(title);
        modal.find('#modal-book-author').val(author);
        modal.find('#modal-book-details').val(details);
        modal.find('#modal-book-availability').val(availability);

        if (image) {
            modal.find('#modal-book-image-preview').attr('src', image).show();
        } else {
            modal.find('#modal-book-image-preview').attr('src', '').hide();
        }
    });

    $('#updateBookForm').on('submit', function (event) {
        event.preventDefault();

        var formData = new FormData(this);
        formData.append('book_id', $('#modal-book-id').val());

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === 'success') {
                    alert('Book updated successfully.');
                    $('#bookDetailsModal').modal('hide');
                    location.reload();
                } else {
                    alert('Failed to update book.');
                }
            },
            error: function (xhr, status, error) {
                alert('Error updating book: ' + error);
            }
        });
    });

    $(document).off('click', '.delete-book').on('click', '.delete-book', function () {
        var bookId = $(this).data('id');
        if (confirm('Are you sure you want to delete this book?')) {
            $.ajax({
                type: 'POST',
                url: 'Home/deleteBook',
                data: { book_id: bookId },
                success: function (response) {
                    if (response.status === 'success') {
                        alert('Book deleted successfully.');
                        location.reload();
                    } else {
                        alert('Failed to delete book.');
                    }
                },
                error: function (xhr, status, error) {
                    alert('Error deleting book: ' + error);
                }
            });
        }
    });
});
