$(document).ready(function() {
    $('#bookDetailsModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var title = button.data('title');
        var author = button.data('author');
        var details = button.data('details');
        var availability = button.data('availability');
        
        var modal = $(this);
        modal.find('.modal-title').text('More Details about ' + title);
        modal.find('#modal-book-title').text(title);
        modal.find('#modal-book-author').text('Author: ' + author);
        modal.find('#modal-book-details').text('Details: ' + details);
        modal.find('#modal-book-availability').text('Availability: ' + availability);
    });
});
