<!-- MemberLogin/index.php -->
<form action="<?= site_url('member/login') ?>" method="post">
    <?= csrf_field(); // Include CSRF token ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
