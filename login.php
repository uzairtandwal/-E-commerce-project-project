<?php

if (isset($_SESSION['user_id'])) {
    // Redirect if the user is already logged in
    header("Location: index.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Navbar -->
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color: pink;">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            Frangrances
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item bg-success px-4 mx-3 rounded">
                    <a class="nav-link text-white" href="registration.php">Registration</a>
                </li>
                <li class="nav-item bg-success px-4 rounded">
                    <a class="nav-link text-white" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Login Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="login.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="login_btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2025 MyApp. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<?php
include('dbcon.php');

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user by email
    $qry = "SELECT * FROM `login` WHERE email = '$email'";
    $result = mysqli_query($connection, $qry);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Verify the password
        if ($password == $row['password'] || $email == $row['email']) {
            // Store user information in session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];

            echo "<script type='text/javascript'>alert('Login successful!');</script>";
            echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Invalid email or password. Please try again!');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Invalid email or password. Please try again!');</script>";
    }
}
?>