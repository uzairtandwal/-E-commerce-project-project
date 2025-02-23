<?php
include('header.php');
include('dbcon.php'); // Database connection

// Initialize base query
$query = "SELECT * FROM products WHERE 1=1";

// Handle search and sorting
$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? '';

// Apply search filter
if ($search) {
    $query .= " AND (name LIKE '%$search%' OR type LIKE '%$search%')";
}

// Apply sorting
if ($sort == 'price_asc') {
    $query .= " ORDER BY price ASC";
} elseif ($sort == 'price_desc') {
    $query .= " ORDER BY price DESC";
}

$result = mysqli_query($connection, $query);
?>

<!-- Single Page Header start -->
<!-- <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Shop</li>
    </ol>
</div> -->






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
    background-image: url('img/ban3.jpg');/* Replace this URL with your image */
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

















<!-- Single Page Header End -->

<!-- Fruits Shop Start -->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Latest Fragrances</h1>
        <form action="" method="GET">
            <div class="row g-4 align-items-center mb-4">
                <!-- Search Bar -->
                <div class="col-md-6 col-lg-4">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control p-3" placeholder="Search products..."
                            value="<?php echo htmlspecialchars($search); ?>">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <!-- Sorting Dropdown -->
                <div class="col-md-6 col-lg-4">
                    <select name="sort" class="form-select p-3">
                        <option value="">Default Sorting</option>
                        <option value="price_asc" <?php echo ($sort == 'price_asc') ? 'selected' : ''; ?>>Price: Low to
                            High</option>
                        <option value="price_desc" <?php echo ($sort == 'price_desc') ? 'selected' : ''; ?>>Price: High
                            to Low</option>
                    </select>
                </div>
                <div class="col-md-6 col-lg-4">
                    <button type="submit" class="btn btn-success w-100">Apply Filters</button>
                </div>
            </div>
        </form>




        <div class="row g-4 product-grid">
    <?php while ($product = mysqli_fetch_assoc($result)) { ?>
        <div class="product-item">
            <div class="fruite-img">
                <img src="admin/uploads/<?php echo $product['img']; ?>" class="img-fluid rounded-top" alt="<?php echo $product['name']; ?>">
            </div>
            <div class="p-4 rounded-bottom">
                <div class="product-name"><?php echo $product['name']; ?></div>
                <div class="product-description"><?php echo $product['type']; ?></div>
                <div class="product-price">Rs. <?php echo number_format($product['price']); ?></div>
                <a href="single.php?id=<?php echo $product['id']; ?>" class="btn btn-success w-100 px-5 mt-4 text-white add-to-cart  ">View Product</a>
                <!-- <button type="submit" class="btn btn-success w-100">Apply Filters</button>
                btn btn-success w-100 px-5 mt-4 text-white add-to-cart -->

            </div>
        </div>
    <?php } ?>
</div>


            
<!-- Fruits Shop End -->

<?php
include('footer.php');
?>



<style>
.product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 equal-width columns */
    gap: 20px; /* Space between items */
}

.product-item {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    flex-direction: column; /* To align content properly */
    height: 100%; /* Ensure consistent height */
}

.fruite-img img {
    width: 100%;
    height: 200px; /* Fixed height for product images */
    object-fit: cover; /* Ensures images fit nicely */
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
    color: #666;
    margin-bottom: 1rem;
}

.product-price {
    font-size: 1.2rem;
    font-weight: bold;
    color: #d32f2f;
}
/* .add-to-cart {
    display: block;
    text-align: center;
    padding: 6px 20px; /* Reduced padding for a sleeker look */
    font-size: 1rem; /* Font size for the text */
    font-weight: bold; /* Make the text bold */
    color: #fff; /* Text color */
    background-color: #28a745; /* Green background */
    border: none; /* Remove borders */
    border-radius: 30px; /* Make the button rounded */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add a slight shadow */
    transition: background-color 0.3s, transform 0.2s; /* Add hover effects */
}

.add-to-cart:hover {
    background-color: #218838; /* Darker green on hover */
    transform: scale(1.05); /* Slightly enlarge the button on hover */
    text-decoration: none; /* Remove underline effect */
} */

.add-to-cart {
    display: block;
    text-align: center;
    margin-top: 15px;
    padding: 8px 16px; /* Reduce padding for a thinner button */
    font-size: 0.9rem; /* Optional: Reduce font size */
    border-radius: 4px; /* Optional: Adjust the button corner rounding */
}
</style>