<?php
session_start();

include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$userID = $_SESSION['user_id'];
$stmt = $dbh->prepare("SELECT * FROM users WHERE id = :userID");
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newPhone = $_POST['new_phone'];

    // Basic validation
    if (!empty($newUsername) && !empty($newEmail) && !empty($newPhone)) {
        // Update user information in the database
        $updateStmt = $dbh->prepare("UPDATE users SET username = :newUsername, email = :newEmail, phone = :newPhone WHERE id = :userID");
        $updateStmt->bindParam(':newUsername', $newUsername);
        $updateStmt->bindParam(':newEmail', $newEmail);
        $updateStmt->bindParam(':newPhone', $newPhone);
        $updateStmt->bindParam(':userID', $userID);
        $updateStmt->execute();

        // Redirect to the profile page after updating
        header('Location: profile.php');
        exit();
    }
}
?>
