<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= esc($member['first_name'] . ' ' . $member['last_name']); ?></h5>
        <p class="card-text">Email: <?= esc($member['email']); ?></p>
        <p class="card-text">Phone Number: <?= esc($member['phone_number']); ?></p>
        <p class="card-text">Status: <?= esc($member['status']); ?></p>
        <!-- Additional member details can be added here -->
        <div class="member-actions">
            <button class="btn btn-warning btn-edit">Edit</button>
            <button class="btn btn-danger btn-delete">Delete</button>
        </div>
    </div>
</div>
