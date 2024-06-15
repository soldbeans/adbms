<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="home.css">
    <script src="dynamicTitle.js"></script>
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
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/Home')?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/Catalog')?>">Catalog</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/Checkouts')?>">Checkouts</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/Members')?>">Members</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/Reports')?>">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/addBook')?>">Add Book</a></li>
            </ul>
        </div>
    </nav>
      <!-- Include jQuery and Bootstrap JavaScript -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- External JavaScript file -->
    <script src="<?= base_url('bookDetails.js') ?>"></script>
</body>
</html>