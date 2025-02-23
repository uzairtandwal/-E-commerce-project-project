<?php include 'include/sidebar.php'; ?>

<!-- Main Content -->
<div class="main-content">
    <div class="form-container">
        <h1>Add Product</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="myname">Product Name:</label>
            <input type="text" id="myname" name="myname" required>

            <label for="mytype">Product Type:</label>
            <input type="text" id="mytype" name="mytype" required>

            <label for="myprice">Product Price:</label>
            <input type="number" id="myprice" name="myprice" required>

            <label for="myquantity">Product Quantity:</label>
            <input type="number" id="myquantity" name="myquantity" required>

            <!-- message box for description 
            <label for="mydescription">Product Description:</label>
            <textarea id="mydescription" name="mydescription" cols="30" rows="10"
                placeholder="Enter Product Description" style="width: 100%; margin-bottom: 10px" required></textarea>
 -->

            <label for="myimage">Product Image:</label>
            <input type="file" id="myimage" name="myimage" required>

            <input type="submit" name="save_btn" value="Save">
        </form>
    </div>
</div>
</body>

</html>

<?php
if (isset($_POST['save_btn'])) {
    $p_name = $_POST['myname'];
    $p_type = $_POST['mytype'];
    $p_price = $_POST['myprice'];
    $p_quantity = $_POST['myquantity'];
    // $p_description = $_POST['mydescription'];
    $image_name = $_FILES['myimage']['name'];
    $image_temp = $_FILES['myimage']['tmp_name'];

    // Directory where images will be uploaded
    $upload_dir = "uploads/";

    // Connect to database
    $connection = mysqli_connect("localhost", "root", "", "projects");

    // Move uploaded file directly to the directory
    if (move_uploaded_file($image_temp, $upload_dir . $image_name)) {
        $qry = "INSERT INTO products (name, type, price, quantity, img) 
                VALUES ('$p_name', '$p_type', '$p_price', '$p_quantity', '$image_name')";
        $check = mysqli_query($connection, $qry);

        if ($check) {
            echo "<script type='text/javascript'>alert('Data Saved Successfully');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Something went wrong');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Failed to upload image');</script>";
    }
}

?>