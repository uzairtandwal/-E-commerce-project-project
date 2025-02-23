<?php
$connection = mysqli_connect("localhost", "root", "", "project");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $update_query = "UPDATE orders SET status = '$status' WHERE id = '$order_id'";
    if (mysqli_query($connection, $update_query)) {
        header('Location: index.php'); // Redirect back to dashboard
    } else {
        echo "Error updating status: " . mysqli_error($connection);
    }
}
?>