<!-- app/Views/feedback/index.php -->
<h2>All Feedbacks</h2>
<table>
    <tr>
        <th>Book Name</th>
        <th>Username</th>
        <th>Rating</th>
        <th>Feedback</th>
    </tr>
    <?php if (!empty($feedbacks) && is_array($feedbacks)) : ?>
        <?php foreach ($feedbacks as $feedback) : ?>
        <tr>
            <td><?= esc($feedback['bookname']); ?></td>
            <td><?= esc($feedback['username']); ?></td>
            <td><?= esc($feedback['rating']); ?></td>
            <td><?= esc($feedback['feedback']); ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="4">No feedbacks found</td>
        </tr>
    <?php endif; ?>
</table>

<h2>Add Your Feedback</h2>
<form action="/feedback/add" method="post">
    <label for="bookname">Book Name:</label>
    <input type="text" id="bookname" name="bookname" required><br><br>
    <label for="username">Your Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="rating">Rating:</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>
    <label for="feedback">Your Feedback:</label><br>
    <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br>
    <input type="submit" value="Submit">
</form>

