<?php
session_start();
// store to test if they *were* logged in
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']); //delete session variable
session_destroy(); //kill the session
echo "session ID is " . session_id();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Log Out</title>
</head>

<body>
    <h1>Log Out</h1>
    <?php
    if (!empty($old_user)) {
        echo '<p>You have been logged out.</p>';
    } else {
        // if they weren't logged in but came to this page somehow
        echo '<p>You were not logged in, and so have not been logged out.</p>';
    }
    ?>
    <p><a href="auth.php">Back to Home Page</a></p>
</body>

</html>