<?php
include('header.php');
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Hub</title>
    <style>
     body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to bottom, #f5f5f5, #eaeaea);
    color: #000; /* Set all text color to black */
}

/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
    background-color: #ffffff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 10;
}

.logo {
    font-size: 2em;
    font-weight: bold;
    color: #000; /* Set logo text color to black */
    text-transform: uppercase;
    letter-spacing: 1px;
}

.nav {
    display: flex;
    gap: 25px;
}

.nav a {
    text-decoration: none;
    color: #000; /* Set nav links text color to black */
    font-weight: bold;
    position: relative;
    padding: 5px 0;
    font-size: 1.1em;
    transition: color 0.3s, transform 0.3s;
}

.nav a:hover {
    color: #6b8e23; /* Hover effect keeps a different color */
    transform: translateY(-3px);
}

/* Button Styles for Login/Register */
.actions button {
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    font-size: 1.1em;
    transition: background-color 0.3s, transform 0.3s;
}

.login {
    background-color: #f0c929;
    color: #000; /* Set button text color to black */
    margin-right: 15px;
}

.register {
    background-color: #6b8e23;
    color: #000; /* Set button text color to black */
}

.login:hover {
    background-color: #d8b520;
    transform: translateY(-3px);
}

.register:hover {
    background-color: #5a7a1c;
    transform: translateY(-3px);
}

/* Hero Section */
.hero {
    position: relative;
    text-align: center;
    background-image: url('https://images.unsplash.com/photo-1608475701093-e17fe67e517e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080');
    background-size: cover;
    background-position: center;
    height: 450px;
    color: #000; /* Set hero text color to black */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-shadow: 0 4px 6px rgba(0, 0, 0, 0.7);
}

.hero h1 {
    font-size: 3.5em;
    margin: 0;
    padding-top: 50px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
    line-height: 1.2;
    color: #000; /* Set title text color to black */
}

.hero p {
    font-size: 1.5em;
    margin: 20px 0;
    text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
    max-width: 80%;
    font-style: italic;
    color: #000; /* Set paragraph text color to black */
}

.hero button {
    padding: 15px 30px;
    font-size: 1.2em;
    border: none;
    background-color: #6b8e23;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.hero button:hover {
    background-color: #5a7a1c;
    transform: translateY(-3px);
}

/* Footer */
footer {
    text-align: center;
    padding: 30px;
    background-color: #333;
    color: #fff;
    font-size: 1.1em;
    position: relative;
}

footer a {
    color: #000; /* Set footer link text color to black */
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

footer a:hover {
    color: #f0c929;
    text-decoration: underline;
}
</style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">Perfume Elegance</div>
        <nav class="nav">
            <a href="#home">Home</a>
            <a href="#shop">Shop</a>
            <a href="#contact">Contact</a>
            <a href="#about">About Us</a>
        </nav>
        <div class="actions">
            <button class="login">Login</button>
            <button class="register">Register</button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Scentora</h1>
        <p>Explore our premium collection of luxurious fragrances.</p>
        <!-- <button>Shop Now</button> -->
    </section>

</body>
</html>






            <!-- Banner Section Start-->
            <section class="banner">
    <div class="banner-content">
        <!-- <h1>Discover the Art of Fragrance</h1>
        <p>Experience luxury with our exclusive perfume collection.</p>
        <button>Explore Now</button> -->
    </div>
</section>
           
<style>
/* Full-width and full-height banner */
.banner {
    background-image: url('img/c.jpg');/* Replace this URL with your image */
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 70vh; /* Full page height */
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    position: relative;
}

/* Content styling for banner */
.banner-content {
    text-align: center;
    background-color: rgba(0, 0, 0, 0.5); /* Transparent dark background for better readability */
    padding: 0px;
    border-radius: 10px;
}

.banner-content h1 {
    font-size: 3em;
    margin: 0 0 10px;
}

.banner-content p {
    font-size: 1.5em;
    margin: 0 0 20px;
}

.banner-content button {
    padding: 10px 20px;
    font-size: 1em;
    background-color: #6b8e23;
    border: none;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.banner-content button:hover {
    background-color: #567d1e;
}


</style>
            <!-- Banner Section End -->
























<!-- Hero Start -->
<!-- <div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">100% Original</h4>
                <h1 class="mb-5 display-3 text-primary">Scentora</h1> -->
                <!-- <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number"
                        placeholder="Search">
                    <button type="submit"
                        class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                        style="top: 0; right: 25%;">Submit Now</button>
                </div> -->
            <!-- </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="img/a.webp" class="img-fluid w-100 h-100 bg-secondary rounded"
                                alt="First slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a> -->
                        <!-- </div>
                        <div class="carousel-item rounded">
                            <img src="img/d.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide"> -->
                            <!-- <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a> -->
                        <!-- </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>  -->
<!-- Hero End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start mb-5">
                    <h1>Our Best Sellers</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <!-- <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 130px;">All Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                <span class="text-dark" style="width: 130px;">Vegetables</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                <span class="text-dark" style="width: 130px;">Fruits</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                <span class="text-dark" style="width: 130px;">Bread</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                <span class="text-dark" style="width: 130px;">Meat</span>
                            </a>
                        </li>
                    </ul> -->
                </div>
            </div>








            <div class="container">
                <div class="row">
                    <?php
        $connection = mysqli_connect("localhost", "root", "", "projects");

        // Fetch all products
        $query = "SELECT * FROM products";
        $data = mysqli_query($connection, $query);
        $products = [];
        while ($row = mysqli_fetch_array($data)) {
            $products[] = $row;
        }
        ?>
                    <div id="product-container" class="product-grid">
                        <?php
// Display the first 8 products
foreach ($products as $index => $product) {
    if ($index >= 8) break;
?>
                        <div class="product-item">
                            <div class="fruite-img">
                                <img src="admin/uploads/<?php echo $product['img']; ?>"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="p-4 rounded-bottom">
                                <div class="product-name"><?php echo $product['name']; ?></div>
                                <div class="product-description"><?php echo $product['type']; ?></div>
                                <div class="product-price">Rs. <?php echo number_format($product['price']); ?> <span></span></div>
                                <!-- <div class="product-price">Rs <?php echo $product['price']; ?></div> -->



                                <!-- <a href="add_to_cart.php?id=<?php echo $product['id']; ?>"
                                class="btn btn-primary text-white my-3 py-2 w-100" -->


                                <a href="single.php?id=<?php echo $product['id']; ?>" class="btn btn-success px-5 mt-4 text-white add-to-cart">View Product</a>

                
                            </div>
                        </div>
                        <?php 
} 
?>

                    </div>

                    <!-- View More Button -->
                    <div class="text-center my-4">
                        <a href="shop.php" class="btn btn-primary w-50 py-2 text-white"> View All</a>
                        <!-- <button id="view-more" class="btn btn-danger w-50 py-2 mt-3">View More...</button> -->
                    </div>
                </div>
            </div>

            <!-- Add CSS for Grid Layout -->
            <style>
            .product-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                /* Four equal-width columns */
                gap: 20px;
                /* Space between items */
            }

            .product-item {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                /* Box-shadow for each product */
                overflow: hidden;
                height: 100%;
                /* Ensure products fill the space evenly */
            }

            .fruite-img img {
                width: 100%;
                height: 200px;
                /* Fixed height for the image */
                object-fit: cover;
                /* Ensures the image fits within the given dimensions */
            }

            .p-4 {
                padding: 16px;
            }

            .product-name {
                font-size: 1.2rem;
                font-weight: bold;
                color: #000;
                margin-bottom: 0.5rem;
            }

            .product-description {
                font-size: 1rem;
                font-weight: normal;
                color: #666;
                margin-bottom: 1rem;
            }

            .product-price {
                font-size: 1.2rem;
                font-weight: bold;
                color: #d32f2f;
            }
            </style>


















            <!-- Fact Start -->
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="bg-light p-5 rounded">
                        <div class="row g-4 justify-content-center">
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="counter bg-white rounded p-5">
                                    <i class="fa fa-users text-secondary"></i>
                                    <h4>satisfied customers</h4>
                                    <h1>1963</h1>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="counter bg-white rounded p-5">
                                    <i class="fa fa-users text-secondary"></i>
                                    <h4>quality of service</h4>
                                    <h1>99%</h1>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="counter bg-white rounded p-5">
                                    <i class="fa fa-users text-secondary"></i>
                                    <h4>quality certificates</h4>
                                    <h1>33</h1>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="counter bg-white rounded p-5">
                                    <i class="fa fa-users text-secondary"></i>
                                    <h4>Available Products</h4>
                                    <h1>789</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fact Start -->






            <!-- Tastimonial Start -->
            <div class="container-fluid testimonial py-5">
                <div class="container py-5">
                    <div class="testimonial-header text-center">
                        <h4 class="text-primary">Our Testimonial</h4>
                        <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
                    </div>
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item img-border-radius bg-light rounded p-4">
                            <div class="position-relative">
                                <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                                    style="bottom: 30px; right: 0;"></i>
                                <div class="mb-4 pb-4 border-bottom border-secondary">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                    </p>
                                </div>
                                <div class="d-flex align-items-center flex-nowrap">
                                    <div class="bg-secondary rounded">
                                        <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                            style="width: 100px; height: 100px;" alt="">
                                    </div>
                                    <div class="ms-4 d-block">
                                        <h4 class="text-dark">Client Name</h4>
                                        <p class="m-0 pb-3">Profession</p>
                                        <div class="d-flex pe-5">
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item img-border-radius bg-light rounded p-4">
                            <div class="position-relative">
                                <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                                    style="bottom: 30px; right: 0;"></i>
                                <div class="mb-4 pb-4 border-bottom border-secondary">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                    </p>
                                </div>
                                <div class="d-flex align-items-center flex-nowrap">
                                    <div class="bg-secondary rounded">
                                        <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                            style="width: 100px; height: 100px;" alt="">
                                    </div>
                                    <div class="ms-4 d-block">
                                        <h4 class="text-dark">Client Name</h4>
                                        <p class="m-0 pb-3">Profession</p>
                                        <div class="d-flex pe-5">
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item img-border-radius bg-light rounded p-4">
                            <div class="position-relative">
                                <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                                    style="bottom: 30px; right: 0;"></i>
                                <div class="mb-4 pb-4 border-bottom border-secondary">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                    </p>
                                </div>
                                <div class="d-flex align-items-center flex-nowrap">
                                    <div class="bg-secondary rounded">
                                        <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                            style="width: 100px; height: 100px;" alt="">
                                    </div>
                                    <div class="ms-4 d-block">
                                        <h4 class="text-dark">Client Name</h4>
                                        <p class="m-0 pb-3">Profession</p>
                                        <div class="d-flex pe-5">
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tastimonial End -->


            <?php
include('footer.php');
?>