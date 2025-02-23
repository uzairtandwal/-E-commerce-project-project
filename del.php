<?php
include('dbcon.php');
$id = $_GET['id'];

// Fetch the product details from the database
$select = "SELECT * FROM products WHERE id='$id'";
$data = mysqli_query($connection, $select);

// Check if product exists
if (!$data || mysqli_num_rows($data) == 0) {
    die("Product not found.");
}
$row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        .product-page {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .product-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            padding: 20px;
        }
        .product-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .product-name {
            font-size: 1.5em;
            margin: 10px 0;
        }
        .product-price {
            font-size: 1.2em;
            color: #27ae60;
            margin-bottom: 20px;
        }
        .add-to-cart-button {
            background-color:rgb(146, 34, 211); /* Green background */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: bold;
            border-radius: 25px; /* Rounded button */
            cursor: pointer;
            text-align: center;
            text-transform: uppercase;
            transition: all 0.3s ease-in-out;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px; /* Space between icon and text */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .add-to-cart-button:hover {
            background-color:rgb(62, 9, 73); /* Darker green on hover */
            transform: translateY(-2px); /* Lift effect */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .add-to-cart-button:active {
            transform: translateY(0); /* Normal position on click */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .add-to-cart-button i {
            font-size: 1.2em; /* Icon size */
        }
    </style>
</head>
<body>
    <div class="product-page">
        <div class="product-card">
            <img src="admin/uploads/<?php echo $row['img']; ?>" alt="Product Image" class="product-image">
            <h2 class="product-name"><?php echo $row['name']; ?></h2>
            <div class="product-price">Rs.<?php echo number_format($row['price']); ?></div>
            <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" 
               class="add-to-cart-button"
               onclick="return confirm('Are you sure you want to add this product to your cart?');">
               <i class="fas fa-shopping-cart"></i> Add to Cart
            </a>
        </div>
    </div>
</body>
</html>