<?php

// Start Session
session_start();
require 'dbcon.php';

// Initialize variables
if(isset($_POST['delete_task']))
{
    // Get the task id
    $task_id = mysqli_real_escape_string($con, $_POST['delete_task']);

    // Delete the task
    $query = "DELETE FROM tasks WHERE id='$task_id' ";
    $query_run = mysqli_query($con, $query);

    // Check if query run
    if($query_run)
    {
        $_SESSION['message'] = "Task Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

// Update Task
if(isset($_POST['update_task']))
{
    $task_id = mysqli_real_escape_string($con, $_POST['task_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $priority = mysqli_real_escape_string($con, $_POST['priority']);
    $deadline = mysqli_real_escape_string($con, $_POST['deadline']);

    $query = "UPDATE tasks SET name='$name', description='$description', priority='$priority', deadline='$deadline' WHERE id='$task_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Task Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task Not Updated";
        header("Location: task-edit.php");
        exit(0);
    }

}

if(isset($_POST['save_task']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $priority = mysqli_real_escape_string($con, $_POST['priority']);
    $deadline = mysqli_real_escape_string($con, $_POST['deadline']);

    $query = "INSERT INTO tasks (name, description, priority, deadline) VALUES ('$name', '$description', '$priority', '$deadline')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Task Created Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task Not Created";
        header("Location: task-create.php");
        exit(0);
    }
}
?>



