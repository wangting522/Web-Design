<?php

    $username = $_POST['username'];
    $password = $_POST['password']; 

    // Establish database connection
    $db = new mysqli('localhost', 'christine', 'woaifumu_666', 'assignment2');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Create the SQL query
    $query = "INSERT INTO users (name, password) VALUES ('$username', '$password')";

    // Execute the query
    if ($db->query($query) === TRUE) {
        // echo "New user created successfully in php";
        header('location: index.php');
    } else {
        echo "Error: " . $db->error;
    }

    // Close the connection
    $db->close();
?>
