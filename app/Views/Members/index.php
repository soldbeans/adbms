<link rel="stylesheet" href="<?= base_url('memberDetails.css') ?>">

<div class="container">
    <h2>Member Transactions</h2>

    <!-- Form for adding new member -->
    <form action="<?= base_url('Home/addMember') ?>" method="post">
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
                            <button class="btn btn-info btn-sm btn-view">View</button>
                            <button class="btn btn-warning btn-sm btn-edit">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete">Delete</button>
                        </td>
                    </tr>
                    <tr class="member-details-row collapsed" id="details-<?= esc($member['id']) ?>">
                        <td colspan="7">
                            <div class="member-details">
                                <p>Email: <?= esc($member['email']); ?></p>
                                <p>Phone Number: <?= esc($member['phone_number']); ?></p>
                                <p>Status: <?= esc($member['status']); ?></p>
                                <!-- Add any other member details you need here -->
                            </div>
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

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('memberDetails.js') ?>"></script>

<script>
    $(document).ready(function() {
        // Handle click on View button to toggle member details
        $('.btn-view').on('click', function() {
            var row = $(this).closest('.member-row');
            var detailsRow = row.next('.member-details-row');
            detailsRow.toggle(); // Toggle visibility of details row
        });

        // Other event handlers for Edit and Delete buttons should be similarly handled.
    });
</script>