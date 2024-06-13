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
