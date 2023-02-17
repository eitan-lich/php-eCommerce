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
    <nav>
        <ul class="navbar">
            <li class="navbar-item"><a href="#">Home</a></li>
            <li class="navbar-item"><a href="about.php">About</a></li>
            <li class="navbar-item"><a href="login.php">Login/Register</a></li>
            <li>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input id="search-bar" type="text" name="item" placeholder="Search">
                    <button>
                        <svg aria-hidden="true" class="pre-nav-design-icon" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none">
                            <path stroke="currentColor" stroke-width="1.5" d="M13.962 16.296a6.716 6.716 0 01-3.462.954 6.728 6.728 0 01-4.773-1.977A6.728 6.728 0 013.75 10.5c0-1.864.755-3.551 1.977-4.773A6.728 6.728 0 0110.5 3.75c1.864 0 3.551.755 4.773 1.977A6.728 6.728 0 0117.25 10.5a6.726 6.726 0 01-.921 3.407c-.517.882-.434 1.988.289 2.711l3.853 3.853"></path>
                        </svg>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <main>
        <div class="items">
            <?php

            $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

            if (!empty($_POST['item'])) {
                $desired_item = $_POST["item"];
                $statement = "SELECT * FROM items WHERE item_name LIKE '%$desired_item%'";
                $query_result = mysqli_query($con, $statement);
                while ($row = mysqli_fetch_array($query_result)) {
                    echo "<div class='item-container'>
                        <img src='$row[5]'>
                        <h1>$row[1]</h1>
                        <h2>$$row[2]</h2>
                        <h2>$row[3]</h2>
                        <p>SKU - $row[4]</p>
                        <button class='see-more-btn'>See more</button>
                        <p class='item-description'>$row[6]</p>
                        </div>";
                }
            } else {
                $statement = "SELECT * FROM items";
                $query_result = mysqli_query($con, $statement);
                while ($row = mysqli_fetch_array($query_result)) {
                    echo "<div class='item-container'>
                        <img src='$row[5]'>
                        <h1>$row[1]</h1>
                        <h2>$$row[2]</h2>
                        <h2>$row[3]</h2>
                        <p>SKU - $row[4]</p>
                        <button class='see-more-btn'>See more</button>
                        <p class='item-description'>$row[6]</p>
                        </div>";
                }
            }
            ?>
        </div>
    </main>
    <script src="script.js" defer></script>
</body>

</html>