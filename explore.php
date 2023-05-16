<?php
require 'config.php';
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $user_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$id'");
    $user = mysqli_fetch_assoc($user_query);
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
    <button id="scroll-back">
        <img src="img/top.png">
    </button>
    <div class="profile-link-drop">
        <div class="profile-link-menu">
            <?php
            if (isset($user['name'])) {
                echo $user['name'];
            }
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
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="menu-link-svg" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                <?php
                if (isset($user['name'])) {
                    echo '<ul class="nav-link-container">
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
                           <a href="#" class="explore-user-order">
                               Orders
                           </a>
                       </li>
                       <li class="nav-link" id="profile-menu-button">
                           <a href="#" class="explore-msg-link">
                               <div id="user-profile">
                                   <img class="explore-avatar-ico" src=" img/avatar.jpg">
                                   <div class="online"></div>
                               </div>
                           </a>
                       </li>
                   </ul>';
                } else {
                    echo '<ul class="nav-link-container">
                        <li>
                            <a href="login.php" class="explore-login-link">
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="/Memoire/register.php" class="explore-login-link">Register</a>
                        </li>
                    </ul>';
                }
                ?>
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

    <div class="explore-main">
        <div class="logged_in">
            
                    <?php
                    if (isset($user['name'])) {
                        echo '  
                        <div class="welcome-section">
                        <div class="welcome-main">
                        <div class="welcome-seciton-username">
                            Hi '.$user['name'].',
                        </div>
                        <div class="welcome-section-text">
                            Find the perfect <span>Sellers</span><br>
                            for your Project.
                        </div>
                        <button class="welcome-section-post-btn">
                                Post Service
                        </button>  
                        </div>
                        </div>
                        ';
                    }
                       
                    ?>

                    
               
            <div class="banner-section">
                <div class="banner-section-main">
                    <div class="banner-section-text">
                        <h2>Lorem, ipsum dolor.</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="banner-select-main">
                        <ul class="banner-selction">
                            <li><span id="banner1" class="banner-select banner__selected"></span></li>
                            <li><span id="banner2" class="banner-select"></span></li>
                            <li><span id="banner3" class="banner-select"></span></li>
                            <li><span id="banner4" class="banner-select"></span></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="avaible-services-container">
            <div class="explore-avaible-services-grid">
            <?php
            $query = "SELECT * FROM `services`";
            $result = mysqli_query($conn,$query);
            if (mysqli_num_rows($result) > 0) {    
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="service-card-main">
                    <div class="service-img">
                        <img src="img/imgs/service-placeholder.webp" class="service-card-img">
                    </div>
                    <div class="service-info">
                        <div class="service-user-info">
                            <div class="freelancer-img">
                                <img src="img/avatar.jpg" class="service-card-avatar-img">
                            </div>
                            <div class="freelancer-name">
                                <span>'.$row['name'].'</span>
                            </div>
                        </div>
                        <div class="service-title">
                            <p>'.$row['title'].'</p>
                        </div>
                        <div class="service-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                </path>
                            </svg>
                            <span class="rating-number">
                                5/4.9 <!--php -> service rating -->
                            </span>
                            <span class="buyers-number">
                                (11)
                            </span>
                        </div>
                        <div class="service-price">
                            <span>STARTING AT</span>
                            <p>'.$row['price'].' DA</p>
                        </div>
                    </div>
                    </div>
                    ';}}
                    ?>
                
                
                <div class="service-card-main">
                    <div class="service-img">
                        <img src="img/imgs/service-placeholder.webp" class="service-card-img">
                    </div>
                    <div class="service-info">
                        <div class="service-user-info">
                            <div class="freelancer-img">
                                <img src="img/avatar.jpg" class="service-card-avatar-img">
                            </div>
                            <div class="freelancer-name">
                                <span>Rabeh</span>
                            </div>
                        </div>
                        <div class="service-title">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi.</p>
                        </div>
                        <div class="service-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                </path>
                            </svg>
                            <span class="rating-number">
                                5/4.9 <!--php -> service rating -->
                            </span>
                            <span class="buyers-number">
                                (11)
                            </span>
                        </div>
                        <div class="service-price">
                            <span>STARTING AT</span>
                            <p>4000 DA</p>
                        </div>
                    </div>
                </div>
                
                <div class="service-card-main">
                    <div class="service-img">
                        <img src="img/imgs/service-placeholder.webp" class="service-card-img">
                    </div>
                    <div class="service-info">
                        <div class="service-user-info">
                            <div class="freelancer-img">
                                <img src="img/avatar.jpg" class="service-card-avatar-img">
                            </div>
                            <div class="freelancer-name">
                                <span>Rabeh</span>
                            </div>
                        </div>
                        <div class="service-title">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi.</p>
                        </div>
                        <div class="service-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                </path>
                            </svg>
                            <span class="rating-number">
                                5/4.9 <!--php -> service rating -->
                            </span>
                            <span class="buyers-number">
                                (11)
                            </span>
                        </div>
                        <div class="service-price">
                            <span>STARTING AT</span>
                            <p>4000 DA</p>
                        </div>
                    </div>
                </div>
                <div class="service-card-main">
                    <div class="service-img">
                        <img src="img/imgs/service-placeholder.webp" class="service-card-img">
                    </div>
                    <div class="service-info">
                        <div class="service-user-info">
                            <div class="freelancer-img">
                                <img src="img/avatar.jpg" class="service-card-avatar-img">
                            </div>
                            <div class="freelancer-name">
                                <span>Rabeh</span>
                            </div>
                        </div>
                        <div class="service-title">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi.</p>
                        </div>
                        <div class="service-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                </path>
                            </svg>
                            <span class="rating-number">
                                5/4.9 <!--php -> service rating -->
                            </span>
                            <span class="buyers-number">
                                (11)
                            </span>
                        </div>
                        <div class="service-price">
                            <span>STARTING AT</span>
                            <p>4000 DA</p>
                        </div>
                    </div>
                </div>
                <div class="service-card-main">
                    <div class="service-img">
                        <img src="img/imgs/service-placeholder.webp" class="service-card-img">
                    </div>
                    <div class="service-info">
                        <div class="service-user-info">
                            <div class="freelancer-img">
                                <img src="img/avatar.jpg" class="service-card-avatar-img">
                            </div>
                            <div class="freelancer-name">
                                <span>Rabeh</span>
                            </div>
                        </div>
                        <div class="service-title">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi.</p>
                        </div>
                        <div class="service-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                </path>
                            </svg>
                            <span class="rating-number">
                                5/4.9 <!--php -> service rating -->
                            </span>
                            <span class="buyers-number">
                                (11)
                            </span>
                        </div>
                        <div class="service-price">
                            <span>STARTING AT</span>
                            <p>4000 DA</p>
                        </div>
                    </div>
                </div>
                <div class="service-card-main">
                    <div class="service-img">
                        <img src="img/imgs/service-placeholder.webp" class="service-card-img">
                    </div>
                    <div class="service-info">
                        <div class="service-user-info">
                            <div class="freelancer-img">
                                <img src="img/avatar.jpg" class="service-card-avatar-img">
                            </div>
                            <div class="freelancer-name">
                                <span>Rabeh</span>
                            </div>
                        </div>
                        <div class="service-title">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi.</p>
                        </div>
                        <div class="service-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                </path>
                            </svg>
                            <span class="rating-number">
                                5/4.9 <!--php -> service rating -->
                            </span>
                            <span class="buyers-number">
                                (11)
                            </span>
                        </div>
                        <div class="service-price">
                            <span>STARTING AT</span>
                            <p>4000 DA</p>
                        </div>
                    </div>
                </div>
                <div class="service-card-main">
                    <div class="service-img">
                        <img src="img/imgs/service-placeholder.webp" class="service-card-img">
                    </div>
                    <div class="service-info">
                        <div class="service-user-info">
                            <div class="freelancer-img">
                                <img src="img/avatar.jpg" class="service-card-avatar-img">
                            </div>
                            <div class="freelancer-name">
                                <span>Rabeh</span>
                            </div>
                        </div>
                        <div class="service-title">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi.</p>
                        </div>
                        <div class="service-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                </path>
                            </svg>
                            <span class="rating-number">
                                5/4.9 <!--php -> service rating -->
                            </span>
                            <span class="buyers-number">
                                (11)
                            </span>
                        </div>
                        <div class="service-price">
                            <span>STARTING AT</span>
                            <p>4000 DA</p>
                        </div>
                    </div>
                </div>
                <div class="service-card-main">
                    <div class="service-img">
                        <img src="img/imgs/service-placeholder.webp" class="service-card-img">
                    </div>
                    <div class="service-info">
                        <div class="service-user-info">
                            <div class="freelancer-img">
                                <img src="img/avatar.jpg" class="service-card-avatar-img">
                            </div>
                            <div class="freelancer-name">
                                <span>Rabeh</span>
                            </div>
                        </div>
                        <div class="service-title">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi.</p>
                        </div>
                        <div class="service-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15" height="15">
                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                </path>
                            </svg>
                            <span class="rating-number">
                                5/4.9 <!--php -> service rating -->
                            </span>
                            <span class="buyers-number">
                                (11)
                            </span>
                        </div>
                        <div class="service-price">
                            <span>STARTING AT</span>
                            <p>4000 DA</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>













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