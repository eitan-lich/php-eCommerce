<?php require "database.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="auth-form-container">
        <form class="auth-form" action="signup.php" method="POST">
            <h1>First time here? no problem we'll set you up in a second</h1>
            <label>
                Username
                <input type="text" name="new-username">
            </label>
            <label> Password
                <input type="password" name="new-password">
            </label>
            <button>Sign up</button>
        </form>

        <form class="auth-form" action="signin.php" method="POST">
            <h1>Already have an account?</h1>
            <label>
                Username
                <input type="text" name="existing-username">
            </label>
            <label> Password
                <input type="password" name="existing-password">
            </label>
            <button>Login</button>
        </form>
    </div>
</body>

</html>