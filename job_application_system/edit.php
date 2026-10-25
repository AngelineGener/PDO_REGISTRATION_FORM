<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$id = (int) ($_GET['id'] ?? 0);
$a = getApplicationById($pdo, $id);
if (!$a) { die("Application not found."); }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Application #<?= $a['application_id'] ?></h2>
    <form class="app-form" action="core/handleForms.php" method="POST">
        <input type="hidden" name="application_id" value="<?= $a['application_id'] ?>">
        <?php include 'formFields.php'; ?>
        <div class="form-actions">
            <button type="submit" name="updateApplication">Save Changes</button>
            <a href="index.php">Cancel</a>
        </div>
    </form>
</body>
</html>