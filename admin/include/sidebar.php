<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!-- Rest of your add.php content -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        height: 100vh;
        background-color: #f4f4f9;
    }

    .sidebar {
        width: 250px;
        background-color: #343a40;
        color: #ffffff;
        position: fixed;
        height: 100%;
        display: flex;
        flex-direction: column;
        padding: 20px;
    }

    .sidebar h2 {
        font-size: 20px;
        margin-bottom: 20px;
        text-align: center;
        color: #ffffff;
    }

    .sidebar a {
        text-decoration: none;
        color: #ffffff;
        padding: 10px 15px;
        margin: 5px 0;
        border-radius: 5px;
        display: block;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    .main-content {
        margin-left: 250px;
        flex-grow: 1;
        padding: 20px;
        height: 100vh;
        overflow-y: auto;
    }

    .main-content h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        color: #333333;
    }

    .table-container {
        background-color: #ffffff;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin: auto;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: center;
    }

    table th {
        background-color: #007bff;
        color: #ffffff;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    button {
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        cursor: pointer;
        text-align: center;
    }

    button a {
        text-decoration: none;
        color: #ffffff;
        font-weight: bold;
    }

    button:hover {
        background-color: #0056b3;
    }

    img {
        max-width: 100px;
        height: auto;
    }

    .actions a {
        text-decoration: none;
        padding: 8px 12px;
        margin: 5px;
        border-radius: 5px;
        font-size: 14px;
    }

    .actions a.edit {
        background-color: #28a745;
        color: #ffffff;
    }

    .actions a.edit:hover {
        background-color: #218838;
    }

    .actions a.delete {
        background-color: #dc3545;
        color: #ffffff;
    }

    .actions a.delete:hover {
        background-color: #c82333;
    }

    .form-container {
        background-color: #ffffff;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        max-width: 500px;
        margin: auto;
    }

    .form-container h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333333;
        text-align: center;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555555;
    }

    .form-container input[type="text"],
    .form-container input[type="number"],
    .form-container input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #cccccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-container input[type="submit"] {
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }

    .form-container input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .dashboard-boxes {
        display: flex;
        justify-content: space-evenly;
        margin-bottom: 20px;
    }

    .box {
        width: 25%;
        padding: 20px;
        color: white;
        text-align: center;
        border-radius: 10px;
        margin: 10px 20px;
    }

    .box .icon {
        font-size: 50px;
        margin-bottom: 10px;
    }

    .box.products {
        background-color: #4CAF50;
    }

    .box.users {
        background-color: #2196F3;
    }

    .order_area {
        margin: 10px 20px;

    }

    .orders {
        margin: 10px 20px;

        padding: 20px;
        color: white;
        text-align: center;
        border-radius: 10px;
        background-color: #FF9800;
    }

    .orders .icon {
        font-size: 50px;
        margin-bottom: 10px;
    }

    .box.revenue {
        background-color: #F44336;
    }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="index.php">Dashboard</a>
        <a href="add.php">Add Product</a>
        <a href="view.php">View Product</a>
        <a href="logout.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
    </div>