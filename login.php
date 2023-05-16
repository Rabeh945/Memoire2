<?php
require 'config.php';
if (isset($_POST["login"])) {
    $name = $_POST["name"];
    $pass = $_POST["password"];
    $checker = mysqli_query($conn, "SELECT * FROM `users` WHERE name = '$name'");

    if (mysqli_num_rows($checker) > 0) {
        $user = mysqli_fetch_assoc($checker);
        if ($user['password'] == $pass ) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: index.php");
        } else {
            $error = "Error: Incorrect Password";
        }
    } else {
        $error = "Error: Account does not exist";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="event_container">
        <?php
        if (isset($error)) {
            echo '<div class="error">' . $error . '</div>';
        }
        ?>
    </div>
    <div class="home-btn">
        <button>
            Home Page
        </button>
    </div>
    <button id="scroll-back">
        <img src="img/top.png">
    </button>

    <div class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content">
                <span class="spinner"></span>
            </div>
        </div>
    </div>
    <div class="reg-log-form-container">
        <div class="register-title">
            <h1>Sign in</h1>
            <span></span>
        </div>
        <form action="" method="POST">
            <div class="input-field">
                <input type="text" name="name" placeholder="Name" autocomplete="off" required>
                <span></span>
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                <span></span>

            </div>
            <div class="center-form-btn">
                <button type="submit" name="login">
                    Login
                </button>
            </div>
        </form>
        <div class="member-already">
            <p>Not a member</p>
            <span id="signup-link">Sign up</span>
        </div>

    </div>



    <script src="js/script.js"></script>
</body>

</html>