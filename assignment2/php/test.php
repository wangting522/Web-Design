<?php

$server_name = "localhost";
$database_name = "assignment2";
$user_name = "SAM";
$user_password = "Sam123";

$connection = new mysqli($server_name, $user_name, $user_password, $database_name) OR die($connection ->connect_error);

$sql="INSERT INTO student(id,name) VALUES('3','minnie')";
if ($connection ->query($sql) === TRUE){
    echo "New record created successfully";
}
else {
    echo "Error:" . $sql . "<br>" . $conection ->error;
}
$connection ->close();
?>
