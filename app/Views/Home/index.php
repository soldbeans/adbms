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
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#catalog">Catalog</a></li>
                <li class="nav-item"><a class="nav-link" href="#checkouts">Checkouts</a></li>
                <li class="nav-item"><a class="nav-link" href="#inventory">Inventory</a></li>
                <li class="nav-item"><a class="nav-link" href="#members">Members</a></li>
                <li class="nav-item"><a class="nav-link" href="#maintenance">Maintenance</a></li>
                <li class="nav-item"><a class="nav-link" href="#reports">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/addBook')?>">Add Book</a></li>
            </ul>
        </div>
    </nav>
    <div class="container main">
        <div id="home" class="section">
            <h2>Welcome to the Library Management System</h2>
            <p>This application facilitates the collection, storage, and analysis of various types of data related to book checkouts, inventory management, member transactions, and equipment maintenance. By centralizing this information, the library system intends to optimize operational efficiency, enhance user services, and improve decision-making processes for library administrators and staff.</p>
        </div>
        <div id="catalog" class="section">
            <h2>Book Catalog</h2>
            <div class="card-columns">
                <!-- Book 1 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 1</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Author Name 1</h6>
                        <p class="card-text">Genre: Fiction</p>
                        <p class="card-text">Availability: In Stock</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                <!-- Book 2 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 2</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Author Name 2</h6>
                        <p class="card-text">Genre: Fiction</p>
                        <p class="card-text">Availability: In Stock</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                <!-- Book 3 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 3</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Author Name 3</h6>
                        <p class="card-text">Genre: Fiction</p>
                        <p class="card-text">Availability: In Stock</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                <!-- Book 4 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 4</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Author Name 4</h6>
                        <p class="card-text">Genre: Fiction</p>
                        <p class="card-text">Availability: In Stock</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                <!-- Book 5 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Title 5</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Author Name 5</h6>
                        <p class="card-text">Genre: Fiction</p>
                        <p class="card-text">Availability: In Stock</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="checkouts" class="section">
            <h2>Checkouts</h2>
            <form>
                <div class="form-group">
                    <label for="book-id">Book ID</label>
                    <input type="text" class="form-control" id="book-id" name="book-id">
                </div>
                <div class="form-group">
                    <label for="member-id">Member ID</label>
                    <input type="text" class="form-control" id="member-id" name="member-id">
                </div>
                <div class="form-group">
                    <label for="checkout-date">Checkout Date</label>
                    <input type="date" class="form-control" id="checkout-date" name="checkout-date">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div id="inventory" class="section">
            <h2>Inventory Management</h2>
            <form>
                <div class="form-group">
                    <label for="book-title">Book Title</label>
                    <input type="text" class="form-control" id="book-title" name="book-title">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author">
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
        </div>
        <div id="members" class="section">
            <h2>Member Transactions</h2>
            <form>
                <div class="form-group">
                    <label for="member-name">Member Name</label>
                    <input type="text" class="form-control" id="member-name" name="member-name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <button type="submit" class="btn btn-primary">Add Member</button>
            </form>
        </div>
        <div id="maintenance" class="section">
            <h2>Equipment Maintenance</h2>
            <form>
                <div class="form-group">
                    <label for="equipment-id">Equipment ID</label>
                    <input type="text" class="form-control" id="equipment-id" name="equipment-id">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="maintenance-date">Maintenance Date</label>
                    <input type="date" class="form-control" id="maintenance-date" name="maintenance-date">
                </div>
                <button type="submit" class="btn btn-primary">Record Maintenance</button>
            </form>
        </div>
        <div id="reports" class="section">
            <h2>Reports</h2>
            <p>Generate various reports to analyze data:</p>
            <ul>
                <li><a href="#checkout-report" class="btn btn-outline-secondary">Checkout Report</a></li>
                <li><a href="#inventory-report" class="btn btn-outline-secondary">Inventory Report</a></li>
                <li><a href="#member-report" class="btn btn-outline-secondary">Member Report</a></li>
                <li><a href="#maintenance-report" class="btn btn-outline-secondary">Maintenance Report</a></li>
            </ul>
        </div>
        <div id="add-book" class="section">
            <h2>Add New Book</h2>
            <form>
                <div class="form-group">
                    <label for="new-book-title">Book Title</label>
                    <input type="text" class="form-control" id="new-book-title" name="new-book-title">
                </div>
                <div class="form-group">
                    <label for="new-author">Author</label>
                    <input type="text" class="form-control" id="new-author" name="new-author">
                </div>
                <div class="form-group">
                    <label for="new-genre">Genre</label>
                    <input type="text" class="form-control" id="new-genre" name="new-genre">
                </div>
                <div class="form-group">
                    <label for="new-quantity">Quantity</label>
                    <input type="number" class="form-control" id="new-quantity" name="new-quantity">
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