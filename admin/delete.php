<?php

session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}


$id=$_GET['id'];

$connection=mysqli_connect("localhost","root","","projects");
$query="DELETE FROM products where id='".$id."'";
$data=mysqli_query($connection,$query);

if($data)
{ 
  ?>
<script type="text/javascript">
alert("Data Deleted Successfully");
window.open("http://localhost/fruit_web/admin/view.php", "_self");
</script>


<?php
}
else 
{ 
  ?>
<script type="text/javascript">
alert("Something went wrong ");
</script>
<?php
}

?>