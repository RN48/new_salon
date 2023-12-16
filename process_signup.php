<?php
include 'db.php'; // Assuming this file contains your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Basic validation
    if (empty($username) || empty($email) || empty($phone) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Hash the password (for better security, use password_hash())
        $hashedPassword = md5($password);

        // Insert user into the database
        $stmt = $dbh->prepare("INSERT INTO users (username, email, phone, password) VALUES (:username, :email, :phone, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            $stmt->execute();
            echo "Signup successful!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    // Redirect to the signup page if accessed directly without a POST request
    header('Location: signup.php');
    exit();
}
?>
