$(document).ready(function() {
    // Handle View Button Click
    $('#membersTable').on('click', '.btn-view', function() {
        const memberId = $(this).data('id');
        $.ajax({
            url: '/admin/getMemberDetails',
            method: 'POST',
            data: { member_id: memberId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const member = response.member;
                    $('#edit_member_id').val(member.id);
                    $('#edit_first_name').val(member.first_name);
                    $('#edit_last_name').val(member.last_name);
                    $('#edit_email').val(member.email);
                    $('#edit_phone_number').val(member.phone_number);
                    $('#edit_status').val(member.status);
                    $('#edit_created_at').val(member.created_at);
                    $('#edit_updated_at').val(member.updated_at);
                    $('#memberDetailModal').modal('show');
                } else {
                    alert(response.message);
                }
            }
        });
    });

    // Handle Edit Button Click
    $('#membersTable').on('click', '.btn-edit', function() {
        const memberId = $(this).data('id');
        $.ajax({
            url: '/admin/getMemberDetails',
            method: 'POST',
            data: { member_id: memberId },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const member = response.member;
                    $('#edit_member_id').val(member.id);
                    $('#edit_first_name').val(member.first_name);
                    $('#edit_last_name').val(member.last_name);
                    $('#edit_email').val(member.email);
                    $('#edit_phone_number').val(member.phone_number);
                    $('#edit_status').val(member.status);
                    $('#memberDetailModal').modal('show');
                } else {
                    alert(response.message);
                }
            }
        });
    });

    // Handle Save Changes Button in Modal
    $('#memberDetailForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/admin/updateMember',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#memberDetailModal').modal('hide');
                    alert('Member updated successfully');
                    location.reload(); // Reload page to see the updated list
                } else {
                    alert(response.message);
                }
            }
        });
    });

    // Handle Delete Button Click
    $('#membersTable').on('click', '.btn-delete', function() {
        const memberId = $(this).data('id');
        if (confirm('Are you sure you want to delete this member?')) {
            $.ajax({
                url: '/admin/deleteMember',
                method: 'POST',
                data: { member_id: memberId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Member deleted successfully');
                        location.reload(); // Reload page to see the updated list
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    });
});