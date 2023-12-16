<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernameOrEmail = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Basic validation
    if (empty($usernameOrEmail) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Hash the password for comparison
        $hashedPassword = md5($password);

        // Check if user exists
        $stmt = $dbh->prepare("SELECT * FROM users WHERE (username = :usernameOrEmail OR email = :usernameOrEmail) AND password = :password");
        $stmt->bindParam(':usernameOrEmail', $usernameOrEmail);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
             header('Location: index.php');;
            } else {
                echo "Invalid username/email or password.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>