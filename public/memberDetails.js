$(document).ready(function() {
    // Handle click on View button to show member details modal
    $('.btn-view').on('click', function() {
        var row = $(this).closest('.member-row');
        var memberId = row.data('member-id');
        $.ajax({
            url: '/Home/getMemberDetails/' + memberId, // Adjust endpoint as needed
            method: 'GET',
            dataType: 'html',
            success: function(response) {
                $('#memberDetailModal .modal-body').html(response);
                $('#memberDetailModal').modal('show');
            },
            error: function() {
                alert('Failed to fetch member details.'); // This message appears when there's an error
            }
        });
    });

    // Handle click on Edit button
    $(document).on('click', '.btn-edit', function() {
        var row = $(this).closest('.member-row');
        var memberId = row.data('member-id');
        window.location.href = '/Home/updateMember/' + memberId; // Adjusted route
    });

    // Handle click on Delete button
    $(document).on('click', '.btn-delete', function() {
        var row = $(this).closest('.member-row');
        var memberId = row.data('member-id');

        // Confirm deletion
        if (confirm('Are you sure you want to delete this member?')) {
            $.ajax({
                url: '/Home/deleteMember',
                method: 'POST',
                data: { member_id: memberId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        console.log('Member deleted successfully');
                        // Optionally remove the deleted row from the table
                        row.remove();
                    } else {
                        alert('Failed to delete member.');
                    }
                },
                error: function() {
                    alert('Failed to delete member.');
                }
            });
        }
    });
});
