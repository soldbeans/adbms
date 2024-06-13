<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book - Library Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="header">
        <h1>LIBRARY WORKS</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/Home')?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.html#catalog">Catalog</a></li>
                <li class="nav-item"><a class="nav-link" href="index.html#checkouts">Checkouts</a></li>
                <li class="nav-item"><a class="nav-link" href="index.html#inventory">Inventory</a></li>
                <li class="nav-item"><a class="nav-link" href="index.html#members">Members</a></li>
                <li class="nav-item"><a class="nav-link" href="index.html#maintenance">Maintenance</a></li>
                <li class="nav-item"><a class="nav-link" href="index.html#reports">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="add-book.html">Add Book</a></li>
            </ul>
        </div>
    </nav>
    <div class="container main">
        <div class="section">
            <h2>Add New Book</h2>
            <form>
                <div class="form-group">
                    <label for="book-name">Book Name</label>
                    <input type="text" class="form-control" id="book-name" name="book-name" required>
                </div>
                <div class="form-group">
                    <label for="author-name">Author Name</label>
                    <input type="text" class="form-control" id="author-name" name="author-name" required>
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" required>
                </div>
                <div class="form-group">
                    <label for="availability-stocks">Availability Stocks</label>
                    <input type="number" class="form-control" id="availability-stocks" name="availability-stocks" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Libraryworks.com --- "The library that works"</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
