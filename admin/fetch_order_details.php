<?php
$connection = mysqli_connect("localhost", "root", "", "projects");

if (!$connection) {
    die("Step 1: Database connection failed: " . mysqli_connect_error());
}
echo "Step 1: Database connected successfully.<br>";

// Step 2: Check if 'order_id' is set and valid
if (isset($_GET['order_id']) && is_numeric($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
    echo "Step 2: Order ID received: " . $order_id . "<br>";
} else {
    die("Step 2: Invalid request: Order ID not received or invalid.");
}

// Step 3: Query to fetch order details
$order_query = "SELECT * FROM orders WHERE id = $order_id";
$order_result = mysqli_query($connection, $order_query);

if (!$order_result || mysqli_num_rows($order_result) == 0) {
    die("Step 3: Order not found in the database.");
}
$order_data = mysqli_fetch_assoc($order_result);
echo "Step 3: Order found: " . htmlspecialchars($order_data['name']) . "<br>";

// Step 4: Fetch order items
$items_query = "SELECT * FROM order_items WHERE order_id = $order_id";
$items_result = mysqli_query($connection, $items_query);

if (!$items_result || mysqli_num_rows($items_result) == 0) {
    die("Step 4: No items found for this order.");
}
echo "Step 4: Order items fetched successfully.<br>";
?>
