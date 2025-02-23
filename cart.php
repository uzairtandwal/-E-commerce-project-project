<?php

include('dbcon.php'); // Database connection
include('header.php');


// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    echo "<script type='text/javascript'>alert('Please log in to view your cart.');</script>";
    
    // Redirect using JavaScript only
    echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
    exit(); // Ensure the script stops executing after the redirection
}


$user_email = $_SESSION['user_email'];

// Handle quantity update
if (isset($_POST['update_quantity'])) {
    $cart_id = $_POST['cart_id'];
    $quantity = max(1, intval($_POST['quantity'])); // Ensure minimum quantity of 1
    $update_query = "UPDATE cart SET quantity = $quantity WHERE id = $cart_id AND user_email = '$user_email'";
    mysqli_query($connection, $update_query);
}

// Handle product deletion
if (isset($_POST['delete_product'])) {
    $cart_id = $_POST['cart_id'];
    $delete_query = "DELETE FROM cart WHERE id = $cart_id AND user_email = '$user_email'";
    mysqli_query($connection, $delete_query);
}

// Fetch cart items for the logged-in user
$cart_query = "SELECT * FROM cart WHERE user_email = '$user_email'";
$cart_result = mysqli_query($connection, $cart_query);

// Check if the cart is empty
if (mysqli_num_rows($cart_result) == 0) {
    echo "<h2 class='container py-5' style='margin-top: 5%;'>Your cart is empty.</h2>";
    include('footer.php');
    exit();
}

$total = 0; // Initialize total
?>

<div class="container py-5" style="margin-top: 5%;">

    <h1>Your Cart</h1>
    <div class="row">
        <div class="col-lg-8">

            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                        $product_id = $cart_row['p_id'];

                        // Fetch product details for each product in the cart
                        $product_query = "SELECT * FROM products WHERE id = '$product_id'";
                        $product_result = mysqli_query($connection, $product_query);
                        $product_row = mysqli_fetch_assoc($product_result);

                        if ($product_row) {
                            $product_total = $product_row['price'] * $cart_row['quantity'];
                            $total += $product_total; // Add to total
                            ?>
                    <tr>
                        <td>
                            <img src="admin/uploads/<?php echo $product_row['img']; ?>" style="width: 50px;">
                        </td>
                        <td><?php echo $product_row['name']; ?></td>
                        <td>$<?php echo $product_row['price']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="cart_id" value="<?php echo $cart_row['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $cart_row['quantity']; ?>"
                                    min="1" style="width: 60px;">
                                <button type="submit" name="update_quantity"
                                    class="btn btn-sm btn-primary text-white px-3">Update</button>
                            </form>
                        </td>
                        <td>$<?php echo number_format($product_total, 2); ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="cart_id" value="<?php echo $cart_row['id']; ?>">
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this product?')"
                                    name="delete_product" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-4">

            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">$<?php echo number_format($total, 2); ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10.00</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">$<?php echo number_format($total + 10, 2); ?></h5>
                    </div>
                    <a href="checkout.php?total=<?php echo $total + 10; ?>"
                        class="btn btn-primary btn-block mt-3">Proceed
                        to Checkout</a>
                    <!-- send total checkout price to checkout.php -->

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>