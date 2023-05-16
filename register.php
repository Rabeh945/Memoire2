<?php
if(!empty($_SESSION["id"])){
    header("Location: index.php");
  }
require 'config.php';
if(isset($_POST["register"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $confirmPass = $_POST["confirm-password"];
    if ($pass != $confirmPass){
        $error = 'Error : Password not matching !';
    }
    $checker = mysqli_query($conn,"SELECT * FROM `users` WHERE name = '$name' OR email = '$email'");
    if (mysqli_num_rows($checker) > 0){
        $error = 'ERROR : Account already exist';
    }
    else{
        if ($pass == $confirmPass){
            mysqli_query($conn,"INSERT INTO `users`(`id`, `name`, `email`, `password`, `account_type`)
                         VALUES ('','$name','$email','$pass','User')");
            $alert = 'Your registration was successful';
        }
        else{
            $error = 'ERROR : Password not matching';
        }
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
    <div class="home-btn">
        <button>
            Home Page
        </button>
    </div>
    <button id="scroll-back">
        <img src="img/top.png">
    </button>
    <div class="event_container">
    <?php
        if (isset($error)){
            echo '<div class="error">'.$error.'</div>';
        }
        if(isset($alert)){
            echo '<div class="success">'.$alert.'</div>';
        }
    ?>
    </div>
    
    <div class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content">
                <span class="spinner"></span>
            </div>
        </div>
    </div>
    <div class="reg-log-form-container">
        <div class="register-title">
            <h1>Registration</h1>
            <span></span>
        </div>
        <form action="" method="POST">
            <div class="input-field">
                <input type="text" name="name" placeholder="Name" autocomplete="off" required>
                <span></span>
            </div>
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" autocomplete="off" required>
                <span></span>

            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" autocomplete="off" required >
                <span></span>

            </div>
            <div class="input-field">
                <input type="password" name="confirm-password" placeholder="Confirm Password" autocomplete="off" required>
                <span></span>

            </div>
            <div>
                <span>I Accept all temrs & conditions</span>
                <input type="checkbox" required>
            </div>
            <div class="center-form-btn">
                <button type="submit" name="register">
                    Register Now
                </button>
            </div>
        </form>
        <div class="member-already">
            <p>Already a member</p>
            <span id="signin-link">Log in</span>
        </div>

    </div>



    <script src="js/script.js"></script>
</body>
</html>