<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$applications = getAllApplications($pdo);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Social Media Manager - Job Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="hero">
        <h1>Social Media Manager Application</h1>
        <p>Fill out the form to submit your application.</p>
    </div>

    <h2>Application Form</h2>
    <form class="app-form" action="core/handleForms.php" method="POST">
        <?php $a = null; include 'formFields.php'; ?>
        <button type="submit" name="insertApplication">Submit Application</button>
    </form>

    <h2>All Applications</h2>
    <div class="table-wrap">
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Experience</th>
            <th>Platform</th><th>Portfolio</th><th>Expected Salary</th><th>Date Added</th><th>Actions</th>
        </tr>
        <?php foreach ($applications as $row): ?>
        <tr>
            <td><?= $row['application_id'] ?></td>
            <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= $row['years_experience'] ?> yr(s)</td>
            <td><?= htmlspecialchars($row['primary_platform']) ?></td>
            <td>
                <?php if ($row['portfolio_link']): ?>
                    <a href="<?= htmlspecialchars($row['portfolio_link']) ?>" target="_blank">View</a>
                <?php else: ?>-<?php endif; ?>
            </td>
            <td>₱<?= number_format($row['expected_salary'], 2) ?></td>
            <td><?= date('M d, Y h:i A', strtotime($row['date_added'])) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['application_id'] ?>">Edit</a>
                <form action="core/handleForms.php" method="POST" style="display:inline"
                      onsubmit="return confirm('Delete this application?');">
                    <input type="hidden" name="application_id" value="<?= $row['application_id'] ?>">
                    <button type="submit" name="deleteApplication">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($applications)): ?>
        <tr><td colspan="10" style="text-align:center">No applications yet.</td></tr>
        <?php endif; ?>
    </table>
    </div>
</body>
</html>