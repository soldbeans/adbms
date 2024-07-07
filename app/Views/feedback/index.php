<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <link rel="stylesheet" href="<?= base_url('path/to/your/css/style.css') ?>">
</head>
<body>
    <div class="feedback-container">
        <h1>Feedback List</h1>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Username</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($feedbacks) && is_array($feedbacks)): ?>
                    <?php foreach ($feedbacks as $feedback): ?>
                        <tr>
                            <td><?= esc($feedback['bookname']) ?></td>
                            <td><?= esc($feedback['username']) ?></td>
                            <td><?= esc($feedback['rating']) ?></td>
                            <td><?= esc($feedback['feedback']) ?></td>
                            <td><?= esc($feedback['created_at']) ?></td>
                            <td><?= esc($feedback['updated_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No feedbacks found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
