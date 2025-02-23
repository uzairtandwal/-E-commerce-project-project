<?php include('include/sidebar.php'); ?>



<!-- Main Content -->
<div class="main-content">
    <h1>View Products</h1>
    <div class="table-container">
        <?php
            $connection = mysqli_connect("localhost", "root", "", "projects");
            ?>

        <table>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Product Image</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
                $query = "SELECT * FROM products";
                $data = mysqli_query($connection, $query);
                $result = mysqli_num_rows($data);
                if ($result) {
                    while ($rows = mysqli_fetch_array($data)) {
                ?>
            <tr>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['type']; ?></td>
                <td><?php echo $rows['price']; ?></td>
                <td><?php echo $rows['quantity']; ?></td>
                <td>
                    <img src="uploads/<?php echo $rows['img']; ?>" alt="Product Image">
                </td>
                <td class="actions">
                    <a href="update.php?id=<?php echo $rows['id']; ?>" class="edit">Edit</a>
                </td>
                <td class="actions">
                    <a onclick="return confirm('Are you sure you want to delete this data?')"
                        href="delete.php?id=<?php echo $rows['id']; ?>" class="delete">Delete</a>
                </td>
            </tr>
            <?php
                    }
                }
                ?>
        </table>
    </div>
</div>
</body>

</html>