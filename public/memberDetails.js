$(document).ready(function() {
    // Handle click on View button to toggle member details
    $('.btn-view').on('click', function() {
        var row = $(this).closest('.member-row');
        var detailsRow = row.next('.member-details-row');
        var memberId = row.data('member-id');

        if (detailsRow.is(':visible')) {
            detailsRow.hide();
        } else {
            $.ajax({
                url: '/Home/getMemberDetails/' + memberId,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var member = response.member;
                        var memberDetailsHtml = '<p>Email: ' + member.email + '</p>' +
                                                '<p>Phone Number: ' + member.phone_number + '</p>' +
                                                '<p>Status: ' + member.status + '</p>' +
                                                '<p>Created At: ' + member.created_at + '</p>' +
                                                '<p>Updated At: ' + member.updated_at + '</p>';
                        detailsRow.find('.member-details').html(memberDetailsHtml);
                        detailsRow.show();
                    } else {
                        alert('Failed to fetch member details.');
                    }
                },
                error: function() {
                    alert('Failed to fetch member details.');
                }
            });
        }
    });

    // Handle click on Edit button
    $(document).on('click', '.btn-edit', function() {
        var row = $(this).closest('.member-row');
        var memberId = row.data('member-id');
        window.location.href = '/Home/updateMember/' + memberId;
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
