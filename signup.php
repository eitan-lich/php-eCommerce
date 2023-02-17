<?php 
    require "database.php";

    if(!empty($_POST['new-username'] && $_POST['new-password'])) {
    $username = $_POST['new-username'];
    $password = md5($_POST['new-password']);


    $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

    $statement = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($con, $statement);
    if(mysqli_fetch_assoc($result) == 0) {
        $sql_new_user = "INSERT INTO users (user_id, username, password) VALUES (NULL,'$username','$password')";
        mysqli_query($con, $sql_new_user);
    } else {
        echo "User already exists";
    }
}
