<?php
    include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>



    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">Nankana Sahib</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">uzairpro@gmail.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text-primary display-6">Scentora</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" style="font-weight: 600" class="nav-item nav-link ">Home</a>
                        <a href="shop.php" style="font-weight: 600" class="nav-item nav-link">Shop</a>

                        <a href="contact.php" style="font-weight: 600" class="nav-item nav-link">Contact</a>
                        <a href="about_us.php" style="font-weight: 600" class="nav-item nav-link">About Us</a>




                    </div>
                    <div class="d-flex m-3 me-0">

                        <?php

        // Initialize cart count variable
        $total_sum = 0;

        if (isset($_SESSION['user_email'])) {

            $sql = "SELECT * FROM cart WHERE  user_email = '{$_SESSION['user_email']}'";
            $result = mysqli_query($connection, $sql);

            // Sum up the prices fetched
            while ($row = mysqli_fetch_assoc($result)) {
                $total_sum = $total_sum + 1;
            }
        }
        ?>


                        <a href="cart.php" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo $total_sum; ?></span>
                        </a>
                    </div>

                    <div class="navbar-nav">
                        <?php if (isset($_SESSION['user_email'])) : ?>
                        <!-- Show profile and logout buttons -->
                        <!-- <a href="profile.php" class="nav-item nav-link">Profile</a> -->
                        <a href="logout.php" onclick="return confirm('Are you sure?')"
                            class="btn btn-danger nav-item nav-link text-white">Logout</a>
                        <?php else : ?>
                        <!-- Show login and register buttons -->
                        <a href="login.php" class="btn btn-warning nav-item nav-link mx-3 ">Login</a>
                        <a href="registration.php" class="btn btn-primary nav-item nav-link text-white">Register</a>
                        <?php endif; ?>
                    </div>

                    <!-- <a href="login.php" class="my-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </a> -->
                </div>
        </div>
        </nav>
    </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->