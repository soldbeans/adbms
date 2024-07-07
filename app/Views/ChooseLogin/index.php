<!-- app/Views/ChooseLogin/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose Login</title>
    <link rel="stylesheet" href="ChooseLogin.css">
</head>
<body>
    <div class="choose-login-container">
        <h1>Choose Login</h1>
        <div class="login-options">
            <a href="<?= site_url('/AdminLogin') ?>" class="btn btn-primary">Admin Login</a>
            <a href="<?= site_url('/MemberLogin') ?>" class="btn btn-secondary">User Login</a>
        </div>
    </div>
</body>
</html>

