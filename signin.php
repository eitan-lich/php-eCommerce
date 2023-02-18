<?php session_start();
require "database.php";

if (!empty($_POST['existing-username'] && $_POST['existing-password'])) {
    $username = $_POST['existing-username'];
    $password = md5($_POST['existing-password']);

    $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

    $statement = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($con, $statement);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION["logged-in"] = true;
        $_SESSION['name'] = $username;
        header("Location:index.php");
    } else {
        echo "No such user or wrong username/password";
    }
}
