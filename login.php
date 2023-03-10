<?php session_start();
require "database.php" ?>


<?php require "header.php"?>

<body>
    <div class="auth-form-container">
        <form class="auth-form" id="signup" action="authenticate.php" method="POST">
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

        <form class="auth-form" id="signin" action="authenticate.php" method="POST">
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
    <script src="js/script.js"></script>
</body>

</html>