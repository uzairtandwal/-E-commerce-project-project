<?php
include('dbcon.php');

// Check if the 'id' parameter exists and is valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<h2 style='color: red; text-align: center;'>Invalid product ID. Please go back and try again.</h2>";
    exit;
}

$id = intval($_GET['id']);

// Use prepared statement to prevent SQL injection
$stmt = $connection->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result();

// Check if product exists
if ($data->num_rows == 0) {
    echo "<h2 style='color: red; text-align: center;'>Product not found. Please go back and try again.</h2>";
    exit;
}
$row = $data->fetch_assoc();

// Fallback image if product image is missing
$imagePath = file_exists("admin/uploads/" . $row['img']) ? "admin/uploads/" . $row['img'] : "admin/uploads/default.jpg";

// Fetch additional images (assuming you have a column 'additional_images' in your database)
@$additionalImages = explode(',', $row['additional_images']); // Assuming images are stored as comma-separated values
$additionalImages = array_slice($additionalImages, 0, 3); // Limit to 3 images
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catch 22 Product Page</title>
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

    .additional-images {
      display: flex;
      justify-content: center;
      margin-top: 10px;
    }

    .thumbnail {
      width: 60px;
      height: 60px;
      margin: 5px;
      border: 1px solid #ddd;
      cursor: pointer;
    }

    .thumbnail:hover {
      border-color: #27ae60;
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

    .add-to-cart-button {
      display: inline-block;
      background-color: #27ae60;
      color: #fff;
      padding: 15px 20px;
      text-decoration: none;
      font-size: 16px;
      text-align: center;
    }

    .add-to-cart-button:hover {
      background-color: #2ecc71;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Product Image Section -->
    <div class="image-section">
      <!-- Main Product Image -->
      <img id="main-image" src="<?php echo htmlspecialchars($imagePath); ?>" alt="Product Image" class="main-image">

      <!-- Additional Images Section -->
      <div class="additional-images">
        <?php
        // Fetch additional images from the database
        @$additionalImages = explode(',', $row['additional_images']); // Assuming the images are stored as CSV
        foreach ($additionalImages as $image): ?>
          <img src="admin/uploads/<?php echo htmlspecialchars(trim($image)); ?>" 
               alt="Additional Image" 
               class="thumbnail"
               onclick="updateMainImage('<?php echo htmlspecialchars(trim($image)); ?>')">
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Product Details Section -->
    <div class="details-section">
      <h1><?php echo htmlspecialchars($row['name']); ?></h1>
      <p class="reviews">
        <span class="badge"><?php echo htmlspecialchars($row['type']); ?></span>
      </p>

      <!-- Format Section -->
      <div class="formats">
        <p>Format</p>
        <button>Perfume Spray (50ml)</button>
      </div>

      <!-- Price Section -->
      <div class="price">
        <p>Price</p>
        <p class="amount">Rs. <?php echo number_format($row['price']); ?></p>
      </div>

      <!-- Quantity Section -->
      <div class="quantity">
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" value="1" min="1">
      </div>

      <!-- Add to Cart Button -->
      <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" 
         class="add-to-cart-button"
         onclick="return confirm('Are you sure you want to add this product to your cart?');">
        Add to Cart
      </a>
    </div>
  </div>

  <!-- JavaScript to Change Main Image -->
  <script>
    function updateMainImage(imagePath) {
      document.getElementById('main-image').src = "admin/uploads/" + imagePath;
    }
  </script>
</body>
