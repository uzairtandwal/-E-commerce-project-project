<?php include('include/sidebar.php'); ?>
<!-- Main Content -->
<div class="main-content">
    <h1>Update Product</h1>
    <div class="form-container">
        <?php
            include('connection.php');
            $id = $_GET['id'];

            // Fetch the product details from the database
            $select = "SELECT * FROM products WHERE id='$id'";
            $data = mysqli_query($connection, $select);
            $row = mysqli_fetch_array($data);
            ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <input value="<?php echo $row['name']; ?>" type="text" name="myname" placeholder="Enter Name">
            <input value="<?php echo $row['type']; ?>" type="text" name="mytype" placeholder="Enter Type">
            <input value="<?php echo $row['price']; ?>" type="number" name="myprice" placeholder="Enter Price">
            <input value="<?php echo $row['quantity']; ?>" type="text" name="myquantity" placeholder="Enter Quantity">

            <label>Current Image:</label>
            <img src="uploads/<?php echo $row['img']; ?>" alt="Product Image">

            <label>Upload New Image:</label>
            <input type="file" name="myimage">



            <input style="background: green;" type="submit" name="update_btn" value="Update">
            <button style="background: crimson; width: 100% ; margin-top: 10px"><a href="view.php">Back</a></button>
        </form>
    </div>

    <?php
        if (isset($_POST['update_btn'])) {
            $p_name = $_POST['myname'];
            $p_type = $_POST['mytype'];
            $p_price = $_POST['myprice'];
            $p_quantity = $_POST['myquantity'];
            $new_image_name = $_FILES['myimage']['name'];
            $new_image_temp = $_FILES['myimage']['tmp_name'];

            $upload_dir = "uploads/";

            // Update query based on whether a new image is uploaded
            if (!empty($new_image_name)) {
                if (move_uploaded_file($new_image_temp, $upload_dir . $new_image_name)) {
                    $query = "UPDATE products 
                              SET name = '$p_name', type = '$p_type', price = '$p_price', quantity = '$p_quantity', img = '$new_image_name' 
                              WHERE id = '$id'";
                } else {
                    echo "<script>alert('Failed to upload new image');</script>";
                    exit;
                }
            } else {
                $query = "UPDATE products 
                          SET name = '$p_name', type = '$p_type', price = '$p_price', quantity = '$p_quantity' 
                          WHERE id = '$id'";
            }

            $dat = mysqli_query($connection, $query);

            if ($dat) {
                echo "<script>
                    alert('Data Updated Successfully');
                    window.open('view.php', '_self');
                </script>";
            } else {
                echo "<script>alert('Something went wrong');</script>";
            }
        }
        ?>
</div>
</body>

</html>