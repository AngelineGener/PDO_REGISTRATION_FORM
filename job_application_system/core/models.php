<?php

function getAllApplications($pdo) {
    $stmt = $pdo->query("SELECT * FROM applications ORDER BY application_id DESC");
    return $stmt->fetchAll();
}

function getApplicationById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM applications WHERE application_id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function insertApplication($pdo, $data) {
    $sql = "INSERT INTO applications
            (first_name, last_name, email, phone, years_experience,
             primary_platform, portfolio_link, expected_salary, cover_letter)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $data['first_name'], $data['last_name'], $data['email'], $data['phone'],
        $data['years_experience'], $data['primary_platform'], $data['portfolio_link'],
        $data['expected_salary'], $data['cover_letter']
    ]);
}

function updateApplication($pdo, $id, $data) {
    $sql = "UPDATE applications SET
                first_name = ?, last_name = ?, email = ?, phone = ?,
                years_experience = ?, primary_platform = ?, portfolio_link = ?,
                expected_salary = ?, cover_letter = ?
            WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $data['first_name'], $data['last_name'], $data['email'], $data['phone'],
        $data['years_experience'], $data['primary_platform'], $data['portfolio_link'],
        $data['expected_salary'], $data['cover_letter'], $id
    ]);
}

function deleteApplication($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM applications WHERE application_id = ?");
    return $stmt->execute([$id]);
}