<?php
session_start();
$users = array("Hala", "Mia", "Orange"); //use datbase
$pass = array("xxxx", "yyyy", "zzzz");
if (isset($_POST['userid']) && isset($_POST['password'])) {
    // if the user has just tried to log in
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    //validate existance of the user and passward here, you can use datanase query here
    $key_u = array_search($userid, $users); //you can use query here
    $key_p = array_search($password, $pass);//returen the key 
    if ($key_u > -1 && $key_p > -1) { //if exist in the array
        $_SESSION['valid_user'] = $userid; //create session variable
        $_SESSION['valid_pass'] = $password; //create another session variable
        header("Location: members_only.php"); //redirect the user to the main page
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Home Page</h1>
    <?php
    if (isset($_SESSION['valid_user'])) {
        echo '<p>You are logged in as: ' . $_SESSION['valid_user'] . ' <br />';
        echo "<br>";
        echo "<br>";

        echo "session ID is " . session_id();
        echo "<br>";
        echo "<br>";
        echo '<a href="logout.php">Log out</a></p>';
    } else {
        if (isset($userid)) {
            // if they've tried and failed to log in
            echo '<p>Could not log you in.</p>';
        } else {
            // they have not tried to log in yet or have logged out
            echo '<p>You are not logged in.</p>';
        }
    }
    ?>
    <!-- provide form to log in -->
    <form action="auth.php" method="post">
        <fieldset>
            <legend>Login Now!</legend>
            <p><label for="userid">UserID:</label>
                <input type="text" name="userid" id="userid" size="30" />
            </p>
            <p><label for="password">Password:</label>
                <input type="password" name="password" id="password" size="30" />
            </p>
        </fieldset>
        <button type="submit" name="login">Login</button>
    </form>


    <p><a href="members_only.php">Go to Members Section</a></p>
</body>

</html>