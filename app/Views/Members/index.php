<!DOCTYPE html>
<html>
<head>
    <title>Members</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="container">
        <h2>Member Transactions</h2>

        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

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
            <button type="submit" class="btn btn-primary">Add Member</button>
        </form>

        <h3 class="mt-5">Existing Members</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($members) && is_array($members)): ?>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?= esc($member['id']) ?></td>
                            <td><?= esc($member['first_name']) ?></td>
                            <td><?= esc($member['last_name']) ?></td>
                            <td><?= esc($member['email']) ?></td>
                            <td><?= esc($member['phone_number']) ?></td>
                            <td><?= esc($member['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No members found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
