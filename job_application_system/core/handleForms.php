<?php
require_once 'dbConfig.php';
require_once 'models.php';

function collectFormData() {
    return [
        'first_name'       => trim($_POST['first_name']),
        'last_name'        => trim($_POST['last_name']),
        'email'            => trim($_POST['email']),
        'phone'            => trim($_POST['phone']),
        'years_experience' => (int) $_POST['years_experience'],
        'primary_platform' => $_POST['primary_platform'],
        'portfolio_link'   => trim($_POST['portfolio_link']),
        'expected_salary'  => (float) $_POST['expected_salary'],
        'cover_letter'     => trim($_POST['cover_letter']),
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // INSERT
    if (isset($_POST['insertApplication'])) {
        insertApplication($pdo, collectFormData());
    }

    // UPDATE
    if (isset($_POST['updateApplication'])) {
        updateApplication($pdo, (int) $_POST['application_id'], collectFormData());
    }

    // DELETE
    if (isset($_POST['deleteApplication'])) {
        deleteApplication($pdo, (int) $_POST['application_id']);
    }
}

header("Location: ../index.php");
exit;