<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link rel="stylesheet" href="<?= base_url('memberDetails.css') ?>">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add space above the h2 header */
        h2 {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Members</h2>

    <!-- Form for adding new member -->
    <form action="<?= base_url('admin/addMember') ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= set_value('first_name') ?>">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= set_value('last_name') ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= set_value('phone_number') ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="no violations">No Violations</option>
                <option value="penalized">Penalized</option>
                <option value="banned">Banned</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Member</button>
    </form>

    <!-- Table for displaying existing members -->
    <h3 class="mt-5">Existing Members</h3>
    <table class="table table-bordered" id="membersTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($members) && is_array($members)): ?>
                <?php foreach ($members as $member): ?>
                    <tr class="member-row" data-member-id="<?= esc($member['id']) ?>">
                        <td><?= esc($member['id']) ?></td>
                        <td><?= esc($member['first_name']) ?></td>
                        <td><?= esc($member['last_name']) ?></td>
                        <td><?= esc($member['email']) ?></td>
                        <td><?= esc($member['phone_number']) ?></td>
                        <td><?= esc($member['status']) ?></td>
                        <td>
                            <button class="btn btn-info btn-sm btn-view" data-id="<?= esc($member['id']) ?>">View</button>
                            <button class="btn btn-warning btn-sm btn-edit" data-id="<?= esc($member['id']) ?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= esc($member['id']) ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No members found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal for displaying and editing member details -->
<div class="modal fade" id="memberDetailModal" tabindex="-1" role="dialog" aria-labelledby="memberDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberDetailModalLabel">Member Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="memberDetailForm">
                    <input type="hidden" id="edit_member_id" name="member_id">
                    <div class="form-group">
                        <label for="edit_first_name">First Name</label>
                        <input type="text" class="form-control" id="edit_first_name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="edit_last_name">Last Name</label>
                        <input type="text" class="form-control" id="edit_last_name" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="edit_phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="edit_phone_number" name="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="edit_password">Password</label>
                        <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control" id="edit_status" name="status">
                            <option value="no violations">No Violations</option>
                            <option value="penalized">Penalized</option>
                            <option value="banned">Banned</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_created_at">Created At</label>
                        <input type="text" class="form-control" id="edit_created_at" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_updated_at">Updated At</label>
                        <input type="text" class="form-control" id="edit_updated_at" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveMemberChanges">Save Changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?= base_url('memberDetails.js') ?>"></script>
</body>
</html>
