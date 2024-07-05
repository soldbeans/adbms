<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="<?= base_url('home.css') ?>">
    <link rel="stylesheet" href="<?= base_url('catalog.css') ?>">
</head>
<body>
    <div class="header">
        <h1>LIBRARY WORKS</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/member/MHome')?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/member/catalog')?>">Catalog</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/member/checkouts')?>">My_Checkout</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/member/reports')?>">Report</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/member/profile')?>">Profile</a></li>
                <?php if (session()->has('member_email')): ?>
                    <li class="nav-item ml-auto"><span class="navbar-text"><?= session('member_email') ?></span></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/member/logout')?>">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- Include jQuery and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
