<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="home.css">
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
                <li class="nav-item"><a class="nav-link" href="#checkouts">Checkouts</a></li>
                <li class="nav-item"><a class="nav-link" href="#members">Members</a></li>
                <li class="nav-item"><a class="nav-link" href="#reports">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/addBook')?>">Add Book</a></li>
            </ul>
        </div>
    </nav>