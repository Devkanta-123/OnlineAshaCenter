<?php
// include db connection
include 'db/db_connection.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$password = $_POST['password'];
$address = $_POST['address'];

try {
    // Prepare SQL statement to insert data
    $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, phoneno, password,address) VALUES (:firstname, :lastname, :email, :phoneno, :password,:address)");

    // Bind parameters
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phoneno', $phoneno);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':address', $address);
    // Execute the statement
    $stmt->execute();

    echo "User registered successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>