<?php
include('dbcon.php'); // Database connection

// Get product ID from URL
$product_id = $_GET['id'];

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

$user_email = $_SESSION['user_email'];

// Check if the product ID is valid
if (isset($product_id) && !empty($product_id)) {

    // Check if the product is already in the cart
    $query = "SELECT * FROM cart WHERE p_id = '$product_id' AND user_email = '$user_email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Product is already in cart, update quantity
        $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE p_id = '$product_id' AND user_email = '$user_email'";
        mysqli_query($connection, $update_query);
    } else {
        // Add new product to cart
        $insert_query = "INSERT INTO cart (p_id, user_email, quantity) VALUES ('$product_id', '$user_email', 1)";
        mysqli_query($connection, $insert_query);
    }
}

// Redirect to the cart page or product page
header('Location: cart.php');
exit();