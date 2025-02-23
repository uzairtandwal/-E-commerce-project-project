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
  <title>Catch 22 Product Page</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="image-section"><img src="admin/uploads/<?php echo $row['img']; ?>" alt="Product Image" class="main-image">
      <!-- <div class="thumbnail-section">
        <img src="thumb1.jpg" alt="Thumbnail 1">
        <img src="thumb2.jpg" alt="Thumbnail 2">
        <img src="thumb3.jpg" alt="Thumbnail 3">
      </div> -->
    </div>
    <div class="details-section">
      <h1> <?php echo $row['name']; ?></h1>
      <p class="reviews"> <span class="badge"> <?php echo $row['type']; ?></span></p>
      <div class="formats">
        <p>Format</p>
        <button>Perfume Spray (50ml)</button>
    
      </div>
      <div class="price">
        <p>Price</p>
        <p class="amount">Rs. <?php echo number_format($row['price']); ?> <span></span></p>
        <!-- <p class="amount">Rs <?php echo $row['price']; ?></</p> -->
      </div>
      <div class="quantity">
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" value="1">
      </div>
    
      <!-- <button class="add-to-cart">Add to cart</button> -->
      
      <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" 
               class="add-to-cart-button"
               onclick="return confirm('Are you sure you want to add this product to your cart?');">
               <button class="add-to-cart"></i> Add to Cart </button>
            </a>
    </div>
  </div>
</body>
</html>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
}

.container {
  display: flex;
  max-width: 1200px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.image-section {
  flex: 1;
  padding: 20px;
  text-align: center;
}

.main-image {
  width: 100%;
  max-width: 300px;
}

.thumbnail-section img {
  width: 50px;
  margin: 5px;
  cursor: pointer;
}

.details-section {
  flex: 1;
  padding: 20px;
}

h1 {
  font-size: 28px;
  margin-bottom: 10px;
}

.reviews {
  font-size: 16px;
  margin-bottom: 20px;
}

.badge {
  color: #f39c12;
  font-weight: bold;
}

.formats p, .price p {
  font-weight: bold;
  margin-bottom: 5px;
}

button {
  padding: 10px 15px;
  margin: 5px 0;
  border: 1px solid #ddd;
  background-color: #fff;
  cursor: pointer;
}

button:hover {
  background-color: #f0f0f0;
}

.amount {
  color: #e74c3c;
  font-size: 24px;
  font-weight: bold;
}

.quantity {
  margin: 20px 0;
}

.quantity input {
  width: 50px;
  padding: 5px;
  margin-left: 10px;
}

.info-list {
  list-style-type: none;
  padding: 0;
  margin: 20px 0;
}

.info-list li {
  margin: 5px 0;
}

.add-to-cart {
  background-color: #27ae60;
  color: #fff;
  border: none;
  padding: 15px 20px;
  font-size: 16px;
  cursor: pointer;
}

.add-to-cart:hover {
  background-color: #2ecc71;
}
</style>