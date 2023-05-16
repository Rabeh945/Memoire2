<?php
require 'config.php';
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $user_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$id'");
    $user = mysqli_fetch_assoc($user_query);
} else {
    header("Location: index.php");
}
if (isset($_POST['profile-update'])) {
    #$picture = $_POST[''];
    $email = $_POST['email'];
    $dName = $_POST['display-name'];
   /*  if (isset($email)) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' ")) > 0) {
            echo '<script>alert("email taken")</script>';
            $error [] = 'email taken';
            
        } else {
            mysqli_query($conn, "UPDATE `users` SET `email`='$email'  WHERE id = '$id'");
            echo '<script>alert("ok")</script>';
            
        }
    } */
        if (isset($dName)) {
            if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users` WHERE display_name = '$dName' ")) > 0) {
                echo '<script>alert("name taken")</script>';
                $error [] = 'name taken';
            } else {
                mysqli_query($conn, "UPDATE `users` SET `display_name`='$dName'  WHERE id = '$id' ");
                
            }
        }
        if (!isset($error)){
            header("Location: profile.php");
        }
}
if (isset($_POST['request_seller'])) {
    $firstName = $_POST['first-name']; 
    $familyName = $_POST['family-name'];
    $birthdate = $_POST['birth-date'];
    $gender = $_POST['gender'];
    $idcard = $_POST['id-card'];
    $phone = $_POST['phone'];
    $name = $user['name'];
    $email = $user['email'];
    mysqli_query($conn,"INSERT INTO `requests`(`request_id`, `name`, `email`, `firstname`, `familyname`, `phonenumber`, `idcard`, `birthdate`)
     VALUES ('','$name','$email','$firstName','$familyName','$phone','$idcard','$birthdate')");
}
if (isset($_POST['post-service'])){
    $title = $_POST['service-title'];
    $description = $_POST['service-description'];
    $category = $_POST['service-category'];
    $img = $_POST['service-image'];
    $name = $user['name'];
    mysqli_query($conn,"INSERT INTO `services`(`id_service`, `title`, `description`, `img`, `category`, `name`) 
    VALUES ('','$title','$description','$img','$category','$name')");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>

<body>
    <button id="scroll-back">
        <img src="img/top.png">
    </button>
    <div class="profile-link-drop">
        <div class="profile-link-menu">
            <?php
            echo '@'.$user['name'];
            ?>
            <div class="menu-container">
                <div class="menu-btn-container">
                    <a class="acc-info profile-btn " href="/Memoire/profile.php">
                        <svg viewBox="0 0 64 64" class="menu-link-svg">
                            <path d="M32 1a31 31 0 1 0 31 31A31.035 31.035 0 0 0 32 1zm0 60a29 29 0 1 1 29-29 29.033 29.033 0 0 1-29 29z">
                            </path>
                            <path d="M53.587 46.753a30.997 30.997 0 0 0-43.174 0 1 1 0 0 0 1.394 1.433 28.997 28.997 0 0 1 40.386 0 1 1 0 0 0 1.394-1.433zM32 34a12 12 0 1 0-12-12 12.013 12.013 0 0 0 12 12zm0-22a10 10 0 1 1-10 10 10.011 10.011 0 0 1 10-10z">
                            </path>
                        </svg>
                        <p>Account information</p>
                    </a>
                    <a class="menu-logout-button profile-btn" href="logout.php">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="menu-link-svg" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <p>Log out</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content">
                <span class="spinner"></span>
            </div>
        </div>
    </div>
    <div class="explore-header">

        <div class="explore-header-main">
            <div class="explore-nav-left">
                <div class="explore-logo">
                    <a href="/Memoire/index.php">
                        <p class="explore-logo">
                            Freelance
                        </p>
                    </a>
                </div>
            </div>
            <div class="explore-nav-search">
                <div class="search-container">

                    <input type="text" placeholder="What service are you looking for today?">
                    <button type="submit">
                        <img src=" img/search-ico.png" style="height: 22px;">
                    </button>

                </div>
            </div>
            <div class="explore-nav-navbar">
                <ul class="nav-link-container">
                    <li class="nav-link">
                        <a href="#" class="explore-msg-link">
                            <img class="msg-ico" src=" img/msg.svg">
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" class="explore-noti-link">
                            <img class="bell-ico" src=" img/bell.svg">
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Memoire/explore.php" class="explore-user-order">
                            Explore
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" class="explore-msg-link">
                            <div id="user-profile">
                                <img class="explore-avatar-ico" src=" img/avatar.jpg">
                                <div class="online"></div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="explore-header-belt">
        <div class="explore-avaible-cate">
            <div class="exlplore-belt-service">
                <span class="explore-belt-cate">Graphic & Design</span>
            </div>
            <div class="exlplore-belt-service">
                <span class="explore-belt-cate">Digital Marketing</span>
            </div>
            <div class="exlplore-belt-service">
                <span class="explore-belt-cate"> Writing & Translation</span>
            </div>
            <div class="exlplore-belt-service">
                <span class="explore-belt-cate">Video & Animation</span>
            </div>
            <div class="exlplore-belt-service">
                <span class="explore-belt-cate"> Programming & Tech</span>
            </div>
        </div>
    </div>
    <div class="margin">
    </div>
    <div class="profile-section">
        <div class="profile-main-container">
            <div class="profile-info-container profile-grid">
                <form class="profile-info-main" method="POST" action="">
                    <span class="acc-type">Account type:
                        <?php
                        echo $user['account_type'];
                        ?></span>
                    <div class="profile-img">
                        <span class="picture-hover-container picture-btn">
                            <svg width="16" height="16" class="picture-hover" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 5.8182C6.29294 5.8182 4.90909 7.20205 4.90909 8.90911C4.90909 10.6162 6.29294 12 8 12C9.70706 12 11.0909 10.6162 11.0909 8.90911C11.0909 7.20205 9.70706 5.8182 8 5.8182Z">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.45455 15.2727C1.06878 15.2727 0.698807 15.1195 0.426027 14.8467C0.153246 14.5739 0 14.204 0 13.8182V4.36366C0 3.97789 0.153246 3.60792 0.426027 3.33514C0.698807 3.06236 1.06878 2.90911 1.45455 2.90911H4.36364L5.81818 0.727295H10.1818L11.6364 2.90911H14.5455C14.9312 2.90911 15.3012 3.06236 15.574 3.33514C15.8468 3.60792 16 3.97789 16 4.36366V13.8182C16 14.204 15.8468 14.5739 15.574 14.8467C15.3012 15.1195 14.9312 15.2727 14.5455 15.2727H1.45455ZM3.81818 8.90911C3.81818 6.59956 5.69045 4.72729 8 4.72729C10.3096 4.72729 12.1818 6.59956 12.1818 8.90911C12.1818 11.2187 10.3096 13.0909 8 13.0909C5.69045 13.0909 3.81818 11.2187 3.81818 8.90911ZM2.90909 5.09093C2.90909 5.49259 2.58348 5.8182 2.18182 5.8182C1.78016 5.8182 1.45455 5.49259 1.45455 5.09093C1.45455 4.68927 1.78016 4.36366 2.18182 4.36366C2.58348 4.36366 2.90909 4.68927 2.90909 5.09093Z">
                                </path>
                            </svg>
                        </span>


                        <img src=" img/avatar.jpg" class="profile-avatar">
                        <input type="file" class="change-img" accept="jpg/img/image/jpeg/png">

                    </div>
                    <div class="profile-display-name">
                        <div>

                            <div>
                                <span id="display_name"><?php
                                                        echo $user['display_name'];
                                                        ?></span>
                                <input type="text" name="display-name" style="display: none;" class="profile-input dname">
                                <span class="edit-btn edit-name">
                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3628 2.30102L13.6796 0.618553C12.8553 -0.205791 11.521 -0.205916 10.6965 0.618522L0.778434 10.4718L0.0102775 15.1279C-0.0733163 15.6346 0.365528 16.0736 0.872371 15.99L5.52846 15.2218L15.3824 5.30374C16.2052 4.4809 16.2131 3.15127 15.3628 2.30102ZM6.26384 9.7364C6.39809 9.87065 6.57406 9.93774 6.75 9.93774C6.92593 9.93774 7.1019 9.87065 7.23615 9.7364L10.9558 6.01671L11.8486 6.90949L6.5625 12.2301V10.9377H5.0625V9.43774H3.77012L9.09072 4.15165L9.9835 5.04443L6.26381 8.76408C5.9954 9.03258 5.9954 9.4679 6.26384 9.7364ZM2.56662 14.3169L1.6834 13.4336L2.06278 11.1341L2.63778 10.5627H3.9375V12.0627H5.4375V13.3624L4.86618 13.9375L2.56662 14.3169ZM14.4099 4.33146L14.4083 4.33305L14.4067 4.33465L12.9058 5.8454L10.1548 3.09446L11.6656 1.59352L11.6672 1.59196L11.6687 1.5904C11.9546 1.30458 12.418 1.30105 12.7073 1.59037L14.3903 3.2733C14.699 3.58196 14.7009 4.04046 14.4099 4.33146Z">
                                        </path>
                                    </svg>
                                </span>

                            </div>



                        </div>
                        <span class="account-name">
                            <?php
                            echo '@' . $user['name'];
                            ?>
                        </span>

                    </div>

                    <div class="profile-personal-info">
                        <div class="profile-email-section">
                            <div>
                                <span id="email_address">
                                    <?php
                                    echo $user['email'];
                                    ?>
                                </span>
                                <input type="text" name="email" style="display: none;" class="profile-input demail">
                                <span class="edit-btn edit-email">
                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3628 2.30102L13.6796 0.618553C12.8553 -0.205791 11.521 -0.205916 10.6965 0.618522L0.778434 10.4718L0.0102775 15.1279C-0.0733163 15.6346 0.365528 16.0736 0.872371 15.99L5.52846 15.2218L15.3824 5.30374C16.2052 4.4809 16.2131 3.15127 15.3628 2.30102ZM6.26384 9.7364C6.39809 9.87065 6.57406 9.93774 6.75 9.93774C6.92593 9.93774 7.1019 9.87065 7.23615 9.7364L10.9558 6.01671L11.8486 6.90949L6.5625 12.2301V10.9377H5.0625V9.43774H3.77012L9.09072 4.15165L9.9835 5.04443L6.26381 8.76408C5.9954 9.03258 5.9954 9.4679 6.26384 9.7364ZM2.56662 14.3169L1.6834 13.4336L2.06278 11.1341L2.63778 10.5627H3.9375V12.0627H5.4375V13.3624L4.86618 13.9375L2.56662 14.3169ZM14.4099 4.33146L14.4083 4.33305L14.4067 4.33465L12.9058 5.8454L10.1548 3.09446L11.6656 1.59352L11.6672 1.59196L11.6687 1.5904C11.9546 1.30458 12.418 1.30105 12.7073 1.59037L14.3903 3.2733C14.699 3.58196 14.7009 4.04046 14.4099 4.33146Z">
                                        </path>
                                    </svg>
                                </span>

                            </div>


                        </div>
                        <div class="profile-password-section">
                            <button class="change-btn" type="submit" name="profile-update">Save</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="profile-orders profile-grid">
                <div class="profile-orders-container">
                    <h1>
                        Orders History
                    </h1>
                    <div class="orders-main">
                        <div class="order-placeholder">
                            <div class="order-stats">
                                Status
                            </div>
                            <div class="order-seller">
                                Date
                            </div>
                            <div class="order-date">
                                Seller
                            </div>
                            <div class="order-contact ">
                                Contact
                            </div>
                        </div>
                        <?php
                        $buyer_name = $user['name'];
                        $query = "SELECT * FROM orders WHERE name ='$buyer_name'";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo
                                '<div class="order">          
                                    <div class="order-stats order-flex">'
                                    . $row['status'] .
                                    '</div>
                                    <div class="order-date order-flex">'
                                    . $row['order_date'] .
                                    '</div>
                                    <div class="order-seller order-flex">
                                        ' . $row['seller'] .
                                    '</div>
                                    <div class="order-contact order-flex">
                                        <button class="contact-seller-btn">
                                            Contact Seller
                                        </button>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo '<div> No orders </div>';
                        }
                        ?>
                        <!--  <div class="order">
                            <div class="order-stats order-flex">
                                Dilivred
                            </div>
                            <div class="order-date order-flex">
                                2022/12/03
                            </div>
                            <div class="order-seller order-flex">
                                Riyad Bahriya
                            </div>
                            <div class="order-contact order-flex">
                                <button class="contact-seller-btn">
                                    Contact Seller
                                </button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-stats order-flex">
                                Dilivred
                            </div>
                            <div class="order-date order-flex">
                                2022/12/03
                            </div>
                            <div class="order-seller order-flex">
                                Rabeh Khene
                            </div>
                            <div class="order-contact order-flex">
                                <button class="contact-seller-btn">
                                    Contact Seller
                                </button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-stats order-flex">
                                Dilivred
                            </div>
                            <div class="order-date order-flex">
                                2022/12/03
                            </div>
                            <div class="order-seller order-flex">
                                Riyad Bahriya
                            </div>
                            <div class="order-contact order-flex">
                                <button class="contact-seller-btn">
                                    Contact Seller
                                </button>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order-stats order-flex">
                                Dilivred
                            </div>
                            <div class="order-date order-flex">
                                2022/12/03
                            </div>
                            <div class="order-seller order-flex">
                                Rabeh Khene
                            </div>
                            <div class="order-contact order-flex">
                                <button class="contact-seller-btn">
                                    Contact Seller
                                </button>
                            </div>
                        </div> -->


                    </div>
                </div>
            </div>
            <!--  if account type -> user -->
            <?php
            if ($user['account_type'] == 'User') {
                echo ' <div class="profile-seller profile-grid-1">

                <div class="profile-seller-container">
                    <h1>
                        Apply for seller
                    </h1>
                    <div class="apply-for-seller-container">
                        <form action="profile.php" class="apply-for-seller-form" method="POST">
                            <div class="full-name-field">
                                <div class="first-name-field">
                                    Frist name:
                                    <input type="text" name="first-name" id="">
                                </div>
                                <div class="familiy-name-field">
                                    Familiy Name:
                                    <input type="text" name="family-name" id="">
                                </div>
                            </div>
                            <div class="birthgender-day-field">
                                <div class="birth-field">
                                    Date Birth:
                                    <input type="date" name="birth-date" id="">
                                </div>
                                <div class="gender-field">
                                    Choose Gender:
                                    <select name="gender" id="">
                                        <option value="male"> Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="id-phone-field">
                                <div class="id-field">
                                    National Card
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Choose File
                                    </label>
                                    <input id="file-upload" name="id-card" type="file" />
                                </div>
                                <div class="phone-field">
                                    Phone number
                                    <div>
                                        <input type="text" name="phone" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="become-seller-btn-container">
                                <button type="submit" name="request_seller" class="contact-seller-btn max-width">submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
                ';
            } else {
                echo '<div class="profile-add-service profile-grid">
                <h1>New Service</h1>
                <div class="profile-add-service-container">
                    <form action="profile.php" class="new-service" method="POST">
                        <div class="service-form-flex">
                            <span>Title</span>
                            <input type="text" class="service-title-input service-input" name="service-title">
                        </div>
                        <div class="service-form-cate">
                            <div>
                                <span>Category</span>
                                <input type="text" class="service-input" name="service-category">
                            </div>
                            <div>
                                <span>Upload img</span>
                                <span style="margin-bottom: 8px;">
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Choose File
                                    </label>
                                    <input id="file-upload" type="file" name="service-image">
                                </span>
                            </div>
                        </div>
                        <div class="service-form-flex">
                            <span>Service Description</span>

                            <textarea rows="10" class="service-form-txta" name="service-description"></textarea>
                        </div>
                        <div class="service-form-check">
                            <div>
                                <span>I accept the terms and conditions</span>
                                <input type="checkbox" class="sign-up-check-box" required="">
                            </div>
                            <div>
                                <button type="submit" name="post-service">submit</button>
                            </div>


                        </div>

                    </form>
                </div>
            </div>';
            }

            ?>


            <!-- else -->
        </div>
    </div>
    <div class="margin"></div>

    <footer>
        <div class="footer-container">
            <p>© 2023 My Freelance Website. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>