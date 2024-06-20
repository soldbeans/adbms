<link rel="stylesheet" href="<?= base_url('memberDetails.css') ?>">

<div class="member-details-content">
    <h2>Member Details</h2>
    <?php if (!empty($member)) : ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= esc($member['first_name'] . ' ' . $member['last_name']); ?></h5>
                <p class="card-text">Email: <?= esc($member['email']); ?></p>
                <p class="card-text">Phone Number: <?= esc($member['phone_number']); ?></p>
                <p class="card-text">Status: <?= esc($member['status']); ?></p>
                <!-- Additional member details can be added here -->
            </div>
        </div>
    <?php else : ?>
        <p>Member not found.</p>
    <?php endif; ?>
</div>
