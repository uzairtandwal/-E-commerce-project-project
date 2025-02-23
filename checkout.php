<?php
include('smtp/PHPMailerAutoload.php');
include 'dbcon.php';

// Get total price from URL
$total = isset($_GET['total']) ? floatval($_GET['total']) : 0;
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';

if (!$user_email || $total <= 0) {
    die("<h3>Invalid request. Please try again.</h3>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $state = mysqli_real_escape_string($connection, $_POST['state']);
    $zip = mysqli_real_escape_string($connection, $_POST['zip']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);

    // Start transaction
    mysqli_begin_transaction($connection);
    try {
        // Insert order into `orders` table
        $order_sql = "INSERT INTO orders (user_email, name, email, address, city, state, zip, phone, total_price) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($order_sql);
        $stmt->bind_param("ssssssssd", $user_email, $name, $email, $address, $city, $state, $zip, $phone, $total);
        $stmt->execute();
        $order_id = $stmt->insert_id;

        // Get cart items for the user
        $cart_result = mysqli_query($connection, "SELECT * FROM cart WHERE user_email = '$user_email'");
        $order_details = '';

        while ($cart_row = mysqli_fetch_assoc($cart_result)) {
            $product_id = $cart_row['p_id'];
            $quantity = $cart_row['quantity'];

            // Verify product exists
            $product_query = "SELECT * FROM products WHERE id = ?";
            $product_stmt = $connection->prepare($product_query);
            $product_stmt->bind_param("i", $product_id);
            $product_stmt->execute();
            $product_result = $product_stmt->get_result();

            if ($product_result->num_rows > 0) {
                $product_row = $product_result->fetch_assoc();

                // Insert into `order_items`
                $order_item_sql = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                                   VALUES (?, ?, ?, ?)";
                $order_item_stmt = $connection->prepare($order_item_sql);
                $price = $product_row['price'] * $quantity;
                $order_item_stmt->bind_param("iiid", $order_id, $product_id, $quantity, $price);
                $order_item_stmt->execute();

                $order_details .= "Product: " . $product_row['name'] . ", Quantity: $quantity, Price: Rs. " . number_format($price, 2) . "<br>";
            }
        }

        // Send confirmation email
        $subject = "Order Confirmation - Order #$order_id";
        $message = "Dear $name,<br><br>
                    Thank you for your order!<br>
                    <strong>Order Summary:</strong><br>
                    $order_details
                    <strong>Total:</strong> Rs. " . number_format($total, 2) . "<br><br>
                    Best regards,<br>Scentora Team";

        if (smtp_mailer($email, $subject, $message)) {
            echo "Order placed successfully and confirmation email sent!";
        } else {
            echo "Order placed successfully but failed to send confirmation email.";
        }

        // Clear the cart
        $clear_cart_sql = "DELETE FROM cart WHERE user_email = ?";
        $clear_cart_stmt = $connection->prepare($clear_cart_sql);
        $clear_cart_stmt->bind_param("s", $user_email);
        $clear_cart_stmt->execute();

        // Commit transaction
        mysqli_commit($connection);

        // Redirect to index
        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        mysqli_rollback($connection);
        echo "Error processing order: " . $e->getMessage();
    }
}

function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sibghaalamgir11@gmail.com'; // Replace with your email
        $mail->Password = 'nkvubmaytsqghjci';       // Replace with your email password or app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('sibghaalamgir11@gmail.com', 'Scentora');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $msg;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 50%;
        margin: auto;
        overflow: hidden;
    }

    .main {
        background: #fff;
        padding: 20px;
        margin-top: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .main h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
    }

    .form-group button {
        background: #5cb85c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    .form-group button:hover {
        background: #4cae4c;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="main">
            <h2>Checkout</h2>
            <!-- heading that show the total order price  -->
            <h3>Total: $<?php echo $total; ?></h3>


            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="Phone">Phone#</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <input type="text" id="zip" name="zip" required>
                </div>
                <div class="form-group">
                    <button type="submit">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>