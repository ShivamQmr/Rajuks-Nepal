<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "registration_system";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $databaseName";

if ($conn->query($sqlCreateDatabase) === TRUE) {
    echo "Database created or already exists successfully!<br>";

    // Close the initial connection
    $conn->close();

    // Connect to the created database
    $conn = new mysqli($servername, $username, $password, $databaseName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Continue with the rest of your code...

    // Gather form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // SQL query to insert data into the 'users' table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    die("Error creating database: " . $conn->error);
}
?>
