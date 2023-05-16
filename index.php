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
    <div class="profile-link-drop">
        <div class="profile-link-menu">
            <?php 
            echo 'Welcome : '.$user['name'];
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

    <button id="scroll-back">
        <img src="img/top.png">
    </button>
    <div class="signup-overlay">

    </div>
    <div class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content">
                <span class="spinner"></span>
            </div>
        </div>
    </div>

    <header id="header">
        <div class="nav_main">
            <div class="nav_bar">
                <div class="nav_left">
                    <h1>Freelance</h1>
                </div>
                <div class="nav_mid">

                </div>
                <div class="nav_right">
                    <nav class="freelance_links">
                        <ul class="ul_links">
                            <li>
                                <a href="#contact-US" class="nav_li_link explore_link">Contact</a>
                            </li>
                            <li>
                                <a href="/Memoire/explore.php" class="nav_li_link explore_link">Explore</a>
                            </li>
                            <li>
                                <a href="#become_seller" class="nav_li_link become_seller">Become a Seller</a>
                            </li>
                            <?php
                            if (isset($user)) {
                                echo '<li>';
                                if (isset($user['img'])) {
                                    echo '<img src="' . $user['img'] . '" class="profile-link-avatar-img">';
                                } else {
                                    echo '<img src="img/avatar.jpg" class="profile-link-avatar-img">';
                                }
                                echo '</li>';
                            } else {
                                echo '
                                    <li>
                                    <a href="/Memoire/login.php" class="nav_li_link signin_link">Sign In</a>
                                    </li>
                                    <li style="margin-left: 70px;">
                                    <a href="/Memoire/register.php" class=" signup_link">Join</a>
                                    </li>
                                    ';
                            }
                            ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="header_main">
            <div class="header_main_left">
                <div class="header_main_left_text">
                    <p>
                        Find the perfect <span>freelance</span>
                        <br> services for your business
                    </p>
                </div>
                <div class="header_search_bar">
                    <div>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="#95979D">
                            <path d="m15.89 14.653-3.793-3.794a.37.37 0 0 0-.266-.109h-.412A6.499 6.499 0 0 0 6.5 0C2.91 0 0 2.91 0 6.5a6.499 6.499 0 0 0 10.75 4.919v.412c0
                           .1.04.194.11.266l3.793 3.794a.375.375 0 0 0 .531 0l.707-.707a.375.375 0 0 0 0-.53ZM6.5 11.5c-2.763 0-5-2.238-5-5 0-2.763 2.237-5 5-5 2.762 0 5 2.237 5 5 0 2.762-2.238 5-5 5Z">
                            </path>
                        </svg>
                        <input type="text" placeholder="Search">
                    </div>

                    <button class="search_button">Search</button>
                </div>
                <div class="popular_search">
                    <div class="popular_search_text">
                        Popular:
                    </div>
                    <div class="popular_search_buttons">
                        <button class="popular_btn">Website Design</button>
                        <button class="popular_btn">WordPress</button>
                        <button class="popular_btn">Logo Design</button>
                        <button class="popular_btn">AI Service</button>
                    </div>
                </div>

            </div>
            <div class="header_main_right">
                <!-- <div class="news_container">
                    <div class="news_title">
                        <div class="refresh_news_btn">
                            <button onclick="rotate()"><img id="ref_btn" src="img/refresh.png"></button>
                        </div>
                        <div class="news_title_text">
                            News
                        </div>
                    </div>
                    <div class="news_info">
                        <div class="news_date">
                            <p>2020/04/01</p>
                        </div>
                        <div class="news_informations">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Quidem voluptate dignissimos molestiae suscipit
                            animi provident alias accusantium temporibus quam praesentium,
                            officia ipsam! Nemo beatae accusamus veniam numquam dicta.
                            Cupiditate, nostrum?
                        </div>

                    </div>
                    <div class="news_info">
                        <div class="news_date">
                            <p>2020/04/01</p>
                        </div>
                        <div class="news_informations">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Quidem voluptate dignissimos molestiae suscipit
                            animi provident alias accusantium temporibus quam praesentium,
                            officia ipsam! Nemo beatae accusamus veniam numquam dicta.
                            Cupiditate, nostrum?
                        </div>

                    </div>
                </div> -->
                <div class="register_container">

                </div>
            </div>

        </div>


    </header>
    <div class="margin">

    </div>
    <div class="section_1">
        <div class="section_1_main">
            <div class="about_containter">
                <h1>What is free lance ?
                </h1>
                <h2>
                    Find the perfect freelancer for your project. Our platform connects you with a diverse pool of
                    highly skilled professionals in a wide range of industries. With our easy-to-use tools, you can
                    quickly find the right person for the job and get started on your project today.
                </h2>
            </div>
        </div>
    </div>
    <div class="section_2">
        <div class="feartured_services_container" id="featured-services">
            <div class="title">
                <h1>Featured services</h1>
            </div>
            <div class="services_grid_container">
                <div class="services_card logo">
                    <div class="service_desc">
                        Build your brand
                    </div>
                    <div class="service_title">
                        Logo Design
                    </div>
                </div>
                <div class="services_card translate">
                    <div class="service_desc">
                        Translation
                    </div>
                    <div class="service_title">
                        Writing & Translation
                    </div>
                </div>

                <div class="services_card website">
                    <div class="service_desc">
                        Build Website
                    </div>
                    <div class="service_title">
                        Programming & Tech
                    </div>
                </div>
                <div class="services_card marketing">
                    <div class="service_desc">
                        Grow Your Business
                    </div>
                    <div class="service_title">
                        Digital Marketing
                    </div>
                </div>
                <div class="services_card ai_art">
                    <div class="service_desc">
                        AI Artist
                    </div>
                    <div class="service_title">
                        Video & Animation
                    </div>
                </div>
                <div class="services_card voice">
                    <div class="service_desc">
                        Voice & Audio
                    </div>
                    <div class="service_title">
                        Voice Over
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="margin">
    </div>
    <div class="section_3">
        <div class="reviews_main_container">
            <div class="reviews_container">
                <div class="section_title">
                    <h1>Reviews</h1>
                    <h4>Here is some Clients and freelancers talk about their experience using our website</h4>
                </div>
                <div class="reviews_cards_container">
                    <div class="review_card">
                        <div class="reviewer_info">
                            <img class="reviewr_avatar" src="img/avatar.jpg">
                            <div class="reviewer_name">
                                <h2>Rabeh</h2>
                            </div>
                            <div class="revierwer_job">
                                <h4>Client</h4>
                            </div>
                        </div>
                        <div class="review_desc">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam voluptatum cumque iste
                                officiis
                                voluptas
                                architecto, vel laborum illo cum quasi quo impedit sequi debitis illum facere minima
                                , corporis enim, quia ad inventore temporibus neque perspiciatis. Itaque voluptatum
                                dicta
                                voluptate ut.
                            </h5>
                        </div>
                    </div>
                    <div class="review_card">
                        <div class="reviewer_info">
                            <img class="reviewr_avatar" src="img/avatar.jpg">
                            <div class="reviewer_name">
                                <h2>Rabeh</h2>
                            </div>
                            <div class="revierwer_job">
                                <h4>Clinet</h4>
                            </div>
                        </div>
                        <div class="review_desc">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam voluptatum cumque iste
                                officiis
                                voluptas
                                architecto, vel laborum illo cum quasi quo impedit sequi debitis illum facere minima
                                , corporis enim, quia ad inventore temporibus neque perspiciatis. Itaque voluptatum
                                dicta
                                voluptate ut.
                            </h5>
                        </div>
                    </div>
                    <div class="review_card">
                        <div class="reviewer_info">
                            <img class="reviewr_avatar" src="img/avatar.jpg">
                            <div class="reviewer_name">
                                <h2>User</h2>
                            </div>
                            <div class="revierwer_job">
                                <h4>Freelancer</h4>
                            </div>
                        </div>
                        <div class="review_desc">
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam voluptatum cumque iste
                                officiis
                                voluptas
                                architecto, vel laborum illo cum quasi quo impedit sequi debitis illum facere minima
                                , corporis enim, quia ad inventore temporibus neque perspiciatis. Itaque voluptatum
                                dicta
                                voluptate ut.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="margin">
    </div>
    <div class="section_4" id="become_seller">
        <div class="section_main_container">
            <div class="section_title">
                <h1>How to become a seller ?</h1>
                <h2>To become a seller on our website, you typically need to follow these steps :</h2>
            </div>
            <div class="become_seller_container">
                <ol>
                    <li>
                        <h3>Create an account</h3>
                        <p>Sign up for a seller account on the freelance website and provide all the required
                            information.</p>
                    </li>
                    <li>
                        <h3>Create a profile</h3>
                        <p>Create a detailed profile that showcases your skills, experience.</p>
                    </li>
                    <li>
                        <h3>Make your gig</h3>
                        <p>A gig is a small service or project that you offer to potential buyers. You will need to
                            create a gig for each service you want to offer on the platform.</p>
                    </li>
                    <li>
                        <h3>Communicate with clients</h3>
                        <p>Respond to client messages promptly and professionally, and clarify any project details or
                            requirements.</p>
                    </li>
                    <li>
                        <h3>Get paid</h3>
                        <p>Receive payment for your work through the freelance website's payment system.</p>
                    </li>
                </ol>
            </div>
        </div>

    </div>
    <div class="margin">
    </div>
    <div class="section_5" id="contact-US">
        <div class="section_main_container">
            <div class="section_title">
                <h1>Contact US</h1>
            </div>
            <div class="contact-form-container">
                <form id="contact-form" action="" method="post">
                    <label for="email">Email</label>
                    <input type="email" id="email-contact-form" name="email" required>
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="6" required></textarea>
                    <button class="contact-form-submit" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
    <div class="margin">
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