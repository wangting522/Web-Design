<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Establish database connection
    $db = new mysqli('localhost', 'christine', 'woaifumu_666', 'assignment2');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Query the database
    $query = "SELECT * FROM users WHERE name='$username' AND password='$password'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        // Login successful
        header('location: index.php');
        exit();
    } else
    {
        // Login failed
        echo "Invalid username or password";
    }
?>
