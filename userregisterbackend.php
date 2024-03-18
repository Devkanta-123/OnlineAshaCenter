<?php
// include db connection
include 'db/db_connection.php';

$fullname = $_POST['fullname']; // Changed from firstname and lastname to fullname
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$password = $_POST['password'];
$address = $_POST['address'];

try {
    // Prepare SQL statement to insert data
    $stmt = $pdo->prepare("INSERT INTO users (fullname, email, phoneno, password, address) VALUES (:fullname, :email, :phoneno, :password, :address)");

    // Bind parameters
    $stmt->bindParam(':fullname', $fullname); // Changed from firstname and lastname to fullname
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
