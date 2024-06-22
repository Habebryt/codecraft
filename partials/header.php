<?php
require_once "classes/Client.php";

$client = new Client;
$mydata = $client->codeCraft();
foreach ($mydata as $data) {
    $appname = $data['app_name'];
    $fullname = $data['firstname'] . " " . $data['lastname'];
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $logo = $data['logo'];
    $profilePicture = $data['profile_picture'];
    $resume = $data['resume'];
    $portfolio = $data['portfolio'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />



    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Transforming visions into robust web solutions. I am a skilled Full Stack Developer specializing in creating user-centric, scalable web applications with ReactJS, Laravel, Php, and more.">
    <meta name="keywords" content="full stack developer, web development, web applications, ReactJS, Laravel, Nigeria">
    <link rel="canonical" href="https://www.yourwebsite.com/full-stack-developer">
    <meta property="og:title" content="Full Stack Developer | Web Application Development Services in Nigeria">
    <meta property="og:description" content="Transforming visions into robust web solutions. I am a skilled Full Stack Developer specializing in creating user-centric, scalable web applications with ReactJS, Laravel, and more.">
    <meta property="og:image" content="https://www.yourwebsite.com/uploads/logo.png">
    <meta property="og:url" content="https://www.yourwebsite.com/full-stack-developer">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Full Stack Developer | Web Application Development Services in Nigeria">
    <meta name="twitter:description" content="Transforming visions into robust web solutions. I am a skilled Full Stack Developer specializing in creating user-centric, scalable web applications with ReactJS, Laravel, and more.">
    <meta name="twitter:image" content="https://www.yourwebsite.com/uploads/logo.png">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="assets/statics/css/main.css" />
    <link rel="stylesheet" href="assets/statics/css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Full Stack Developer | Web Application Development Services in Nigeria <?php echo $appname ?> - HB</title>

    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon_io/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512*512" href="favicon_io/android-chrome-512x512.png">
    <link rel="icon" type="image/png" href="uploads/favicon.png">
    <!-- <link rel="icon" type="image/png" href="favicon_io/favicon-16x16.png"> -->
</head>

<body>
    <div class="container-fluid vh-100 position-relative">
        <!-- Spinner Start -->
        <div id="spinner" class="bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <div class="row vh-100 justify-content-between">
            <div class="col-md-3 mybg" id="sidebar" class="sidebar mysidebartop">
                <aside class="aside">
                    <div class="row my-3 justify-content-center align-items-center">
                        <div class="col-md-11 text-center">
                            <div class="d-flex justify-content-between align-items-end" id="smdbar">
                                <h1 id="username0" class="username0">
                                    <a href="index.php" id="brandname" class="text-decoration-none username0 btn btn-white mybrandname"><?php echo $fullname ?></a>
                                </h1>
                                <button class="btn btn-contact d-md-none" id="toggleSidebarBtn">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <button class="btn btn-contact d-none d-md-block" id="collapseSidebarBtn">
                                    <i class="fas fa-angle-left"></i>
                                </button>
                            </div>
                            <div class="userimage d-flex align-items-center justify-content-center">
                                <img src="uploads/<?php if (!empty($logo)) {
                                                        echo $logo;
                                                    } else {
                                                        echo $profilePicture;
                                                    } ?>" alt="Profile Picture" id="userpicture" class="img-fluid rounded-circle userpicture" />
                            </div>
                            <div id="smallimage" class="smallscreen d-flex align-items-center justify-content-center d-none">
                                <img src="uploads/<?php if (!empty($logo)) {
                                                        echo $logo;
                                                    } else {
                                                        echo $profilePicture;
                                                    } ?>" alt="Profile Picture" class="img-fluid rounded-circle" />
                            </div>
                            <h1 class="username">
                                <span id="firstname"><?php echo $firstname ?></span>
                                <span id="lastname"><?php echo $lastname ?></span>
                                <button class="btn btn-contact d-none" id="expandSidebarBtn">
                                    <i class="fas fa-angle-right"></i>
                                </button>
                            </h1>
                        </div>
                    </div>
                    <div id="smallnav" class="row hidenav">
                        <ul class="navbar-nav ms-auto d-flex flex-column align-items-center">
                            <li class="nav-item btn">
                                <a class="nav-link" href="index.php">
                                    <i class="fas fa-home nav-link-icon d-none"></i>
                                    <span class="nav-link-text">Home</span>
                                </a>
                            </li>
                            <li class="nav-item btn">
                                <a class="nav-link" href="about.php">
                                    <i class="fas fa-user nav-link-icon d-none"></i>
                                    <span class="nav-link-text">About</span>
                                </a>
                            </li>
                            <li class="nav-item btn">
                                <a class="nav-link" href="service.php">
                                    <i class="fas fa-concierge-bell nav-link-icon d-none"></i>
                                    <span class="nav-link-text">Services</span>
                                </a>
                            </li>
                            <li class="nav-item btn">
                                <a class="nav-link" href="portfolio.php">
                                    <i class="fas fa-briefcase nav-link-icon d-none"></i>
                                    <span class="nav-link-text">Portfolio</span>
                                </a>
                            </li>
                            <li class="nav-item btn">
                                <a class="nav-link" href="testimonial.php">
                                    <i class="fa-regular fa-comment nav-link-icon d-none"></i>
                                    <span class="nav-link-text">Testimonial</span>
                                </a>
                            </li>
                            <li class="nav-item btn">
                                <a class="nav-link" href="newsletter.php">
                                    <i class="fas fa-envelope nav-link-icon d-none"></i>
                                    <span class="nav-link-text">Newsletter</span>
                                </a>
                            </li>
                            <li class="nav-item btn">
                                <a class="nav-link" href="contact.php">
                                    <i class="fas fa-address-book nav-link-icon d-none"></i>
                                    <span class="nav-link-text">Contact</span>
                                </a>
                            </li>
                            <li class="nav-item btn">
                                <a class="nav-link" href="admin/index.php">
                                    <i class="fas fa-angle-right nav-link-icon d-none"></i>
                                    <span class="nav-link-text">Login</span>
                                </a>
                            </li>
                        </ul>
                        <div class="d-flex flex-column align-items-center">
                            <button type="button" class="btn btn-contact my-1 col-8 text-light text-decoration-none" data-toggle="modal" data-target="#myResume"><i class="fa-regular fa-file fa-beat-fade fa-beat-fa"></i>
                                <span class="nav-link-text">Resume</span></button>
                            <button type="button" class="btn btn-primary my-1 col-8 text-light text-decoration-none" data-toggle="modal" data-target="#myPortfolio"><i class="fa-solid fa-business-time fa-beat fa-beat-fa"></i>
                                <span class="nav-link-text">Portfolio</span></button>
                        </div>
                    </div>
                </aside>
            </div>
            <?
