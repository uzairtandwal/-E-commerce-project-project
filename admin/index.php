<?php
$connection = mysqli_connect("localhost", "root", "", "projects");

// Fetch total number of products
$product_query = "SELECT COUNT(*) as total_products FROM products";
$product_result = mysqli_query($connection, $product_query);
$product_data = mysqli_fetch_assoc($product_result);
$total_products = $product_data['total_products'];

// Fetch total number of users
$user_query = "SELECT COUNT(*) as total_users FROM login";
$user_result = mysqli_query($connection, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total_users'];

// Fetch total revenue (assuming 'price' column in 'order_items' table)
$revenue_query = "SELECT SUM(price * quantity) as total_revenue FROM order_items";
$revenue_result = mysqli_query($connection, $revenue_query);
$revenue_data = mysqli_fetch_assoc($revenue_result);
$total_revenue = $revenue_data['total_revenue'];

// Fetch total orders
$order_query = "SELECT COUNT(*) as total_orders FROM orders";
$order_result = mysqli_query($connection, $order_query);
$order_data = mysqli_fetch_assoc($order_result);
$total_orders = $order_data['total_orders'];

// Fetch all orders and their statuses
$orders_query = "SELECT o.id, o.user_email, o.date, o.status, o.total_price
                 FROM orders o
                 JOIN order_items oi ON o.id = oi.order_id
                 GROUP BY o.id
                 ORDER BY o.date DESC";
$orders_result = mysqli_query($connection, $orders_query);
?>

<?php
include('include/sidebar.php');
?>
<div class="main-content">
    <div class="dashboard-boxes">
        <div class="box products">
            <div class="icon">📦</div>
            <div class="info">
                <h1 style="color: #fff; font-size: 40px;"><?php echo $total_products; ?></h1>
                <h2>Total Products</h2>
            </div>
        </div>
        <div class="box users">
            <div class="icon">👥</div>
            <div class="info">
                <h1 style="color: #fff; font-size: 40px;"><?php echo $total_users; ?></h1>
                <h2>Total Users</h2>
            </div>
        </div>

        <div class="box revenue">
            <div class="icon">💰</div>
            <div class="info">
                <h1 style="color: #fff; font-size: 40px;">$<?php echo number_format($total_revenue, 2); ?></h1>
                <h2>Total Revenue</h2>
            </div>
        </div>
    </div>

    <div class="order_area row">
        <!-- Total orders box -->
        <div class="col-md-12">
            <div class="orders">
                <div class="icon">🚚</div>
                <div class="info">
                    <h1 style="color: #fff; font-size: 40px;"><?php echo $total_orders; ?></h1>
                    <h2>Total Orders</h2>
                </div>
            </div>
        </div>

        <!-- Orders table -->
        <div class="col-md-12 mt-4">
            <h3>Order Management</h3>
            <table class="table table-bordered table-striped table-hover table-success">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = mysqli_fetch_assoc($orders_result)) { ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['user_email']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s', strtotime($order['date'])); ?></td>
                        <td>
                            <form method="POST" action="update_order_status.php" class="d-inline">
                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                <select name="status" onchange="this.form.submit()" class="form-select">
                                    <option value="Pending"
                                        <?php if ($order['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                    <option value="Processing"
                                        <?php if ($order['status'] == 'Processing') echo 'selected'; ?>>Processing
                                    </option>
                                    <option value="Delivered"
                                        <?php if ($order['status'] == 'Delivered') echo 'selected'; ?>>Delivered
                                    </option>
                                </select>
                            </form>
                        </td>
                        <td>$<?php echo number_format($order['total_price'], 2); ?></td>
                        <td>
                            <!-- View Button to Trigger Modal -->
                            <button class="btn btn-info view-order"
                                data-order-id="<?php echo $order['id']; ?>">View</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>



        <!-- Modal for Viewing Order Details -->
        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Order details will be dynamically loaded here -->
                        <div id="orderDetailsContent">
                            <p>Loading...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>



</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle view order button click
    document.querySelectorAll('.view-order').forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-order-id');

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('orderModal'));
            modal.show();

            // Fetch order details via AJAX
            fetch(`fetch_order_details.php?order_id=${orderId}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('orderDetailsContent').innerHTML = data;
                })
                .catch(error => {
                    document.getElementById('orderDetailsContent').innerHTML =
                        `<p>Error loading details. Please try again.</p>`;
                });
        });
    });
});
</script>

</body>

</html>