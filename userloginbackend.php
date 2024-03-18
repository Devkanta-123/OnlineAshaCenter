<?php
session_start();
include 'db/db_connection.php';

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

try {
    // Prepare SQL statement to check user credentials
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Check if user exists
    if ($stmt->rowCount() > 0) {
        $_SESSION['email'] = $email;
        echo 'success';
    } else {
        echo 'Invalid username or password';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>