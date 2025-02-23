<?php 
session_start();

$connection=mysqli_connect("localhost","root" ,"","projects");
if(!$connection)
{ echo "DB not connected"; }


?>