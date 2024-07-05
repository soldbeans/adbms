<!-- app/Views/reports_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags, title, stylesheets, and scripts -->
</head>
<body>
    <div id="reports" class="section">
        <h2>Reports</h2>
        <p>Generate various reports to analyze data:</p>

        <!-- Existing reports -->
        <?php foreach ($reports as $report): ?>
            <div class="report-item">
                <div class="report-icon"><?= strtoupper(substr($report['book_title'], 0, 1)) ?></div>
                <div class="report-details">
                    <div class="report-name"><?= $report['book_title'] ?></div>
                    <div class="report-book"><?= $report['author'] ?></div>
                </div>
                <!-- Assuming 'rating' is a field in the 'books' table -->
                <div class="report-rating"><?= $report['rating'] ?> <span class="star">★</span></div>
            </div>
        <?php endforeach; ?>

        <!-- Feedback items -->
        <div id="feedbackSection">
            <h3>Feedback</h3>
            <?php if (!empty($feedback)): ?>
                <?php foreach ($feedback as $item): ?>
                    <div class="feedback-item">
                        <div class="feedback-name"><?= $item['name'] ?></div>
                        <div class="feedback-book"><?= $item['book'] ?></div>
                        <div class="feedback-rating"><?= $item['rating'] ?> <span class="star">★</span></div>
                        <div class="feedback-text"><?= $item['feedback'] ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No feedback yet.</p>
            <?php endif; ?>
        </div>

        <!-- Feedback Form -->
        <div class="feedback-form">
            <h3>Give Feedback</h3>
            <form id="feedbackForm" action="<?= site_url('reports/submitFeedback') ?>" method="post">
                <!-- Input fields for feedback form -->
                <input type="text" name="name" placeholder="Your Name" required><br>
                <input type="text" name="book" placeholder="Book Title" required><br>
                <select name="rating" required>
                    <option value="">Rate this book</option>
                    <option value="1">1 star</option>
                    <option value="2">2 stars</option>
                    <option value="3">3 stars</option>
                    <option value="4">4 stars</option>
                    <option value="5">5 stars</option>
                </select><br>
                <textarea name="feedback" placeholder="Your Feedback" required></textarea><br>
                <button type="submit">Submit Feedback</button>
            </form>
        </div>
    </div>
</body>
</html>
